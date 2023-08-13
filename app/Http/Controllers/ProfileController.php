<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        Alert::success('Success', 'Profile Updated Successfully');
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        if(auth()->user()->isTeacher || auth()->user()->isAdmin){
            $request->validateWithBag('userDeletion', [
                //check if the password fied matches "CONFIREM"
                'password' => ['required'],
            ]);
            $user = User::find($request->id);
        }else{
            $request->validateWithBag('userDeletion', [
                //check if the password fied matches "CONFIREM"
                'password' => ['required', 'current_password'],
            ]);
            $user = $request->user();
        }


        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Success', 'Account Deleted Successfully');

        return Redirect::to('/');
    }
}
