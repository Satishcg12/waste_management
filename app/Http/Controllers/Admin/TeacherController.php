<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //search
        if (request()->has('search')) {
            $teachers = Teacher::join('grades', 'grades.id', '=', 'teachers.grade_id')
                ->select('teachers.*', 'grades.name as grade_name')
                ->where('teachers.name', 'like', '%' . request('search') . '%')
                ->orWhere('grades.name', 'like', '%' . request('search') . '%')
                ->orWhere('teachers.email', 'like', '%' . request('search') . '%')
                ->orderBy('grade_id', 'asc')
                ->orderBy('name', 'asc')
                ->paginate(10);
        } else {
            $teachers = Teacher::orderBy('grade_id', 'asc')->orderBy('name', 'asc')->paginate(10);
        }

        //alert confirm
        $title = "Delete Teacher";
        $message = "Are you sure you want to delete this teacher?";
        confirmDelete($title, $message);

        return view('admin.teachers.index', compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create', [
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
            'phone' => ['required', 'numeric', 'unique:admins', 'unique:users', 'unique:teachers', 'digits:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'grade_id' => ['required', 'integer', 'exists:grades,id']
        ]);

        $user = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'grade_id' => $request->grade_id,
        ]);


        return redirect()->route('admin.teacher.create')->withSuccess('Teacher Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {

        $grades = Grade::all();
        return view('admin.teachers.edit', compact('teacher', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        // dd($request->all());
        //validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required|numeric|digits:10|unique:teachers,phone,' . $teacher->id. '|unique:users,phone,' . $teacher->id,
            'grade_id' => 'required|integer|exists:grades,id'

        ]);

        //update the user
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'grade_id' => $request->grade_id,
        ]);

        return back()->withSuccess('Teacher Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teacher.index')->withSuccess('Teacher Deleted Successfully');

    }
}
