<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Validator;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        //check if the current password matches the one in the database
        //error validation
        if ($validated->fails()) {
            return back()->withErrors($validated->errors());
        }elseif (!Hash::check($request->current_password, auth()->guard('teacher')->user()->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }


        //update password
       Teacher::where('id', auth()->guard('teacher')->user()->id)->update([
            'password' => Hash::make($request->password),
        ]);


        return back()->withSuccess('Password updated.');
    }
}
