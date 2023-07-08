<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin){
            $submission = Submission::orderByDesc('created_at')->paginate(10);
            return view('dashboard')->with('submission', $submission);
        }else if(auth()->user()->isTeacher){
            $submission = Submission::whereHas('user', function($q){
                $q->where('grade_id', '=', auth()->user()->grade_id);
            })->orderByDesc('created_at')->paginate(10);
        }else{
            $submission = Submission::where('user_id', '=', auth()->id())->orderByDesc('created_at')->paginate(10);
        }
        // $submission = Submission::orderByDesc('created_at')->paginate(10);
        // dd($submission);
        return view('dashboard')->with('submission', $submission);
    }
}
