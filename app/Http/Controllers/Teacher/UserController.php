<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreUserRequest;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

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



        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


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
    public function store(StoreUserRequest $request)
    {

        do {
            $username = strtolower(str_replace(' ', '_', $request->name)).'_'.rand(1000, 9999);

        } while (User::where('username', $username)->exists());


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'grade_id' => $request->grade_id,
            'username' => $username,
        ]);

        return redirect()->route('teacher.user.create')->withSuccess('User Created Successfully');
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
            return redirect()->route('teacher.user.index')->withError('You are not allowed to edit this user');
        }
        return view('teacher.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validate the request
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $user->id,
            'upload_count' => 'required|integer|between:0,5'
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'upload_count' => $request['upload_count'],

        ]);

        return redirect()->route('teacher.user.edit', $user)->with('user', $user)->withSuccess('User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // filter by grade
        if ($user->grade_id != auth()->guard('teacher')->user()->grade_id) {
            return redirect()->route('teacher.user.index')->withError('User Not Found');
        }
        $user->delete();

        return redirect()->route('teacher.user.index')->withSuccess('User Deleted Successfully');

    }
}
