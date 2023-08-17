<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
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
            'id' => 'required|exists:users,id',
            'password' => 'required|string|confirmed|min:8',
        ]);

        //error validation
        if ($validated->fails()) {
            return back()->withErrors($validated->errors());
        }

        //update password
        User::find($request->id)->update([
            'password' => Hash::make($validated->validated()['password']),
        ]);


        return back()->withSuccess('Password updated.');
    }
}
