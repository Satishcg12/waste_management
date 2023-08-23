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

        //confirm alert
        $title = 'Admins';
        $message = 'Are you sure you want to delete this Admin?';
        confirmDelete($title, $message);

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins|unique:users|unique:teachers',
            'phone' => 'required|numeric|unique:admins|unique:users|unique:teachers|digits:10',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        return back()->withSuccess('Admin Created Successfully');

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
            'phone' => ['required', 'numeric', 'digits:10', 'unique:admins,phone,' . $admin->id, 'unique:users,phone,' . $admin->id, 'unique:teachers,phone,' . $admin->id],
            'email' => ['required', 'string', 'email', 'max:255'],

        ]);

        $admin->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return back()->withSuccess('Admin Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id == 1) {
            return back()->withError('You Cannot Delete Super Admin');
        }
        if ($admin->id == auth()->guard('admin')->user()->id) {
            return back()->withError('You Cannot Delete Current Admin');
        }
        $admin->delete();

        return back()->withSuccess('Admin Deleted Successfully');
    }
}
