<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // searching
        if (request()->has('search')) {
            // join username, grade to submission
            $submissions = Submission::join('users', 'users.id', '=', 'submissions.user_id')
                ->join('grades', 'grades.id', '=', 'users.grade_id')
                ->select('submissions.*', 'users.name as user_name', 'grades.name as grade_name')
                ->where('users.name', 'like', '%' . request('search') . '%')
                ->orWhere('grades.name', 'like', '%' . request('search') . '%')
                ->orWhere('submissions.title', 'like', '%' . request('search') . '%')
                ->orWhere('submissions.description', 'like', '%' . request('search') . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                // dd($submissions);
        }
        else {
            $submissions = Submission::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('admin.dashboard', compact('submissions'));
    }
}
