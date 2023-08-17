<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
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



        }elseif (request()->has('grade')||request()->has('status')) {
            // dd(request('status'));
            // join username, grade to submission
            $submissions = Submission::join('users', 'users.id', '=', 'submissions.user_id')
                ->join('grades', 'grades.id', '=', 'users.grade_id')
                ->select('submissions.*', 'users.name as user_name', 'grades.name as grade_name')
                ->where('grades.name', 'like', '%' . request('grade') . '%')
                ->where('submissions.status', 'like', '%' . request('status') . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);


        }
        else {
            $submissions = Submission::orderBy('updated_at', 'desc')->paginate(10);
        }
        $grades = Grade::all();


        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.dashboard', compact('submissions', 'grades'));
    }
}
