<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //search
        if (request()->has('search')) {
            $grades = Grade::where('name', 'like', '%' . request('search') . '%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else {
            $grades = Grade::orderBy('id', 'asc')->paginate(10);
        }
        //alert
        $title = 'Grades';
        $message = 'Are you sure you want to delete this Grade?';
        confirmDelete($title, $message );

        return view('admin.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:grades'],
        ]);

        $grade = Grade::create([
            'name' => $request->name,
        ]);


        return redirect()->route('admin.grade.create')->withSuccess('Grade Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:grades,name,' . $grade->id],
        ]);

        $grade->update([
            'name' => $request->name,
        ]);

        return back()->withSuccess('Grade Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grade.index')->withSuccess('Grade Deleted Successfully');
    }
}
