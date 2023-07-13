<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('grade_id', 'asc')->orderBy('name', 'asc')->paginate(10);


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


        return redirect()->route('admin.user.create')->with('status', 'success');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'upload_count' => 'required|integer|between:0,5',
            'grade_id' => 'required',

        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'upload_count' => $request['upload_count'],
            'grade_id' => $request['grade_id'],
        ]);
        return redirect()->route('admin.user.edit', $user)->with('status', 'user-updated')->with('user', $user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('status', 'user-deleted')->with('user', $user);

    }
}
