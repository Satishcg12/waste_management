<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd(auth()->guard('teacher')->user()->grade_id);
        //tacher id
        $grade_id = auth()->guard('teacher')->user()->grade_id;
        // get Submissions for teacher of same grade
        $submissions = Submission::leftJoin('users', 'users.id', '=', 'submissions.user_id')
            ->select('submissions.*')
            ->where('users.grade_id', $grade_id)
            ->orderBy('submissions.created_at', 'desc')
            ->paginate(10);

        // dd($submissions);



        return view('teacher.dashboard', compact('submissions'));
    }
}
