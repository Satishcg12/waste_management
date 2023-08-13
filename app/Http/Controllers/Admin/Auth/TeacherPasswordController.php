<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherPasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            //check if the password fied matches "CONFIREM"
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        // dd($validated);
        Teacher::find($request->id)->update([
            'password' => bcrypt($validated['password']),
        ]);

        Alert::success('Success', 'Password Updated Successfully');
        return back()->with('status', 'password-updated');

    }
}
