<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $submission = Submission::where('user_id', '=', auth()->id())->orderByDesc('created_at')->paginate(10);

        return view('authorized.dashboard')->with('submission', $submission);
    }
}
