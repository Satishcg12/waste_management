<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $submission = Submission::all();
        return view('dashboard')->with('submission', $submission);
    }
}
