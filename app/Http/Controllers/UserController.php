<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin) {
            $admins = Admin::all()->pluck('email')->toArray();
            //sort by name
            $users = User::whereNotIn('email', $admins)->orderBy('name', 'asc')->paginate(10);

            // dd($users);
        } else if (auth()->user()->isTeacher) {
            //get user with same grade as teacher
            $teachers = Teacher::all()->pluck('email')->toArray();
            $admins = Admin::all()->pluck('email')->toArray();

            //get user and sort by name wiht pagination
            $users = User::whereNotIn('email', $teachers)->whereNotIn('email', $admins)->where('grade_id', auth()->user()->grade_id)->orderBy('name', 'asc')->paginate(10);
            // dd($users);

        } else {
            //redirect to profile page
            return redirect()->route('profile.edit');
        }

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('auth.register', [
                'grades' => Grade::all(),
            ]);
        // return redirect()->route('profile.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ((auth()->user()->isTeacher && $user->grade_id == auth()->user()->grade_id)) {
            return view('user.edit', compact('user'));
        } else if (auth()->user()->isAdmin) {
            $grades = Grade::all();
            return view('user.edit', compact('user', 'grades'));
        }
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        if ((auth()->user()->isTeacher && $user->grade_id == auth()->user()->grade_id)) {
            //validate the request
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'todays_upload_number' => 'required',
            ]);

            $user->update($request->all());
            return redirect()->route('user.edit', $user)->with('status', 'user-updated')->with('user', $user);
        } else if (auth()->user()->isAdmin) {
            //validate the request
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'todays_upload_number' => 'required',
                'grade' => 'required',

            ]);

            $user->update($request->all());
            return redirect()->route('user.edit', $user)->with('status', 'user-updated')->with('user', $user);
        }
        return redirect()->route('user.edit', $user)->with('status', 'user-not-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ((auth()->user()->isTeacher && $user->grade_id == auth()->user()->grade_id) || auth()->user()->isAdmin) {
            $user->delete();
            return redirect()->route('user.index')->with('status', 'user-deleted')->with('user', $user);
        }
        return redirect()->route('user.index')->with('status', 'user-not-deleted');
    }
}
