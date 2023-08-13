<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // search
        if (request()->has('search') && request()->get('search') != '') {
            $users = User::where('grade_id', auth()->guard('teacher')->user()->grade_id)
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . request()->get('search') . '%')
                        ->orWhere('email', 'like', '%' . request()->get('search') . '%');
                })
                ->orderBy('name', 'asc')
                ->paginate(10);
                // dd($users);
        } else {
            $users = User::where('grade_id', auth()->guard('teacher')->user()->grade_id)->orderBy('name', 'asc')->paginate(10);
        }


        return view('teacher.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins', 'unique:users', 'unique:teachers'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'grade_id' => ['required', 'integer', 'exists:grades,id']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'grade_id' => $request->grade_id,

        ]);

        Alert::success('Success', 'User Created Successfully');

        return redirect()->route('teacher.user.create')->with('status', 'success');
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

        // filter by grade
        if ($user->grade_id != auth()->guard('teacher')->user()->grade_id) {
            return redirect()->route('teacher.user.index')->with('status', 'user-not-found');
        }
        return view('teacher.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validate the request
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email',
            'upload_count' => 'required|integer|between:0,5'
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'upload_count' => $request['upload_count'],

        ]);

        Alert::success('Success', 'User Updated Successfully');
        return redirect()->route('teacher.user.edit', $user)->with('status', 'user-updated')->with('user', $user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Alert::success('Success', 'User Deleted Successfully');
        return redirect()->route('teacher.user.index')->with('status', 'user-deleted')->with('user', $user);

    }
}
