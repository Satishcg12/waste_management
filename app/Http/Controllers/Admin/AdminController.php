<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //search
        if (request()->has('search')) {
            $admins = Admin::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            // except super admin and current admin
            $admins = Admin::where('id', '!=', 1)
            ->where('id', '!=', auth()->guard('admin')->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //unique in admins, users, and teachers table
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins', 'unique:users', 'unique:teachers'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            //hash password
            'password' => bcrypt($request->password),
        ]);

        Alert::success('Success', 'Admin Created Successfully');
        return back()->with('status', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //unique in admins, users, and teachers table
            'email' => ['required', 'string', 'email', 'max:255'],

        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            //hash password
        ]);

        Alert::success('Success', 'Admin Updated Successfully');
        return back()->with('status', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id == 1) {
            Alert::error('Error', 'You Cannot Delete Super Admin');
            return back()->with('status', 'error');
        }
        if ($admin->id == auth()->guard('admin')->user()->id) {
            Alert::error('Error', 'You Cannot Delete Yourself');
            return back()->with('status', 'error');
        }
        $admin->delete();

        Alert::success('Success', 'Admin Deleted Successfully');
        return back()->with('status', 'success');
    }
}
