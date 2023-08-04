<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $submission = Submission::where('user_id', '=', auth()->id())->orderByDesc('created_at')->paginate(10);

        return view('user.dashboard')->with('submission', $submission);
    }

    public function agreeToTermsAndConditions()
    {
        $user = auth()->user();
        $user->update([
            'TermsAndConditions' => true,
        ]);
        return redirect()->route('dashboard');
    }
}
