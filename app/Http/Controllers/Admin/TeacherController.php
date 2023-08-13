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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'grade_id' => ['required', 'integer', 'exists:grades,id']
        ]);

        $user = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'grade_id' => $request->grade_id,
        ]);

        Alert::success('Success', 'Teacher Created Successfully');
        return redirect()->route('admin.teacher.create')->with('status', 'success');
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
            'email' => ['required', 'email', 'unique:teachers', 'unique:users', 'unique:admins'],
            'grade_id' => 'required',

        ]);

        //update the user
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'grade_id' => $request->grade_id,
        ]);

        Alert::success('Success', 'Teacher Updated Successfully');
        return back()->with('status', 'teacher-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        Alert::success('Success', 'Teacher Deleted Successfully');
        return redirect()->route('admin.teacher.index')->with('status', 'user-deleted');

    }
}
