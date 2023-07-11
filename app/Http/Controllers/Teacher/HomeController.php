<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get Submissions
        $submissions = Submission::orderBy('created_at', 'desc')->paginate(10);

        return view('teacher.dashboard', compact('submissions'));
    }
}
