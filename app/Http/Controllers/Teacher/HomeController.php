<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $grade_id = auth()->guard('teacher')->user()->grade_id;


        //serarch
        if (request()->has('search') && request()->get('search') != '') {
            $submissions = Submission::join('users', 'users.id', '=', 'submissions.user_id')
                ->join('grades', 'grades.id', '=', 'users.grade_id')
                ->select('submissions.*', 'users.name', 'grades.id as grade_id')
                ->where('grades.id', $grade_id)
                ->where(function ($query) {
                    $query->where('users.name', 'like', '%' . request()->get('search') . '%')
                        ->orWhere('submissions.title', 'like', '%' . request()->get('search') . '%')
                        ->orWhere('submissions.description', 'like', '%' . request()->get('search') . '%');
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(10);

        }
        //filter
        elseif (request()->has('filter') && request()->get('filter') != '') {
            $submissions = Submission::join('users', 'users.id', '=', 'submissions.user_id')
                ->join('grades', 'grades.id', '=', 'users.grade_id')
                ->select('submissions.*', 'users.name', 'grades.id as grade_id')
                ->where('grades.id', $grade_id)
                ->where('submissions.status', request()->get('filter'))
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        else {
            $submissions = Submission::join('users', 'users.id', '=', 'submissions.user_id')
                ->where('users.grade_id', $grade_id)
                ->select('submissions.*')
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        $title = 'Delete Submission!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('teacher.dashboard', compact('submissions'));
    }
}
