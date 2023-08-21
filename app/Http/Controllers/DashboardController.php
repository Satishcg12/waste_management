<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->has('search') && request()->get('search') != '') {
            $submission = Submission::where('user_id', '=', auth()->id())
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . request()->get('search') . '%')
                        ->orWhere('description', 'like', '%' . request()->get('search') . '%');
                })
                ->orderByDesc('created_at')
                ->paginate(10);
        } elseif (request()->has('status') && request()->get('status') != '') {
            $submission = Submission::where('user_id', '=', auth()->id())
                ->where('status', request()->get('status'))
                ->orderByDesc('created_at')
                ->paginate(10);
        } else
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
