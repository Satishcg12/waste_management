<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CascadeSubmissoinOnUserDelete;
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
        //search
        if (request()->has('search')) {
            $users = User::join('grades', 'grades.id', '=', 'users.grade_id')
                ->select('users.*', 'grades.name as grade_name')
                ->where('users.name', 'like', '%' . request('search') . '%')
                ->orWhere('grades.name', 'like', '%' . request('search') . '%')
                ->orWhere('users.email', 'like', '%' . request('search') . '%')
                ->orderBy('grade_id', 'asc')
                ->orderBy('name', 'asc')
                ->paginate(10);
        } else{

            $users = User::orderBy('grade_id', 'asc')->orderBy('name', 'asc')->paginate(10);
        }


        //alert confirm
        $title = "Delete User";
        $message = "Are you sure you want to delete this user?";
        confirmDelete($title, $message);

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'grades' => Grade::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|email|max:255|unique:admins|unique:teachers',
            'phone' => 'required|numeric|digits:10|unique:users|unique:admins|unique:teachers',
            'password' => 'required|confirmed|min:8',
            'grade_id' => 'required|integer|exists:grades,id'
        ]);

        //generate username
       do{
            $username = strtolower(str_replace(' ', '_', $request->name)).'_'.rand(1000, 9999);
        }while(User::where('username', $username)->exists());


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'password' => Hash::make($request->password),
            'grade_id' => $request->grade_id,
            'username' => $username,

        ]);


        return redirect()->route('admin.user.create')->withSuccess('User Created Successfully');
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

        $grades = Grade::all();
        return view('admin.users.edit', compact('user', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validate the request
        $validation=$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|numeric|digits:10|unique:users,phone,'.$user->id.'|unique:admins,phone|unique:teachers,phone',
            'upload_count' => 'required|integer|between:0,5',
            'grade_id' => 'required|integer|exists:grades,id'

        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'upload_count' => $request['upload_count'],
            'phone' => $request['phone'],
            'grade_id' => $request['grade_id'],
        ]);
        return redirect()->route('admin.user.edit', $user)->withSuccess('User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //delete all submissions of this user using job
        foreach ($user->submission as $submission) {
            CascadeSubmissoinOnUserDelete::dispatch($submission);
        }
        $user->delete();
        return redirect()->route('admin.user.index')->withSuccess('User Deleted Successfully');

    }
}
