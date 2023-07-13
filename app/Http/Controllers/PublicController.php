<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $submissions = Submission::where('status','approved')->paginate(10);
        // dd($submissions);

        return view('home',compact('submissions'));
    }
}
