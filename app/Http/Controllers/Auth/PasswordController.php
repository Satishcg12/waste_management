<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        if(auth()->user()->isTeacher || auth()->user()->isAdmin){
            $validated =$request->validateWithBag('updatePassword', [
                //check if the password fied matches "CONFIREM"
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
            User::find($request->id)->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('status', 'password-updated');
        }else{
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
            return back()->with('status', 'password-updated');
        }
    }
}
