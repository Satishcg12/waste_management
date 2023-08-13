<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherSubmissionController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function teacherEdit(Submission $submission)
    {
        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            return redirect()->route('teacher.dashboard')->with('status', 'submission-not-found');
        }
        return view('teacher.submission.edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function teacherUpdate(UpdateSubmissionRequest $request, Submission $submission)
    {
        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            return redirect()->route('teacher.dashboard')->with('status', 'submission-not-found');
        }
        // validate and check if the title and description matches previous title and description
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'status' => 'required|in:pending,approved,rejected',
        ]);
        // update submission
        $submission->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,

        ]);
        // redirect
        return back()->with('status', 'submission-updated');

    }


    /**
     * Update the specified resource in storage.
     */
    public function approve(Submission $submission)
    {

        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            Alert::error('Error', 'Submission Not Found');
            return redirect()->route('teacher.dashboard')->with('status', 'submission-not-found');
        }
        // update submission
        $submission->update([
            'status' => 'approved',
        ]);
        Alert::success('Success', 'Submission Approved Successfully');
        // redirect
        return back()->with('status', 'submission-approved');

    }

    /**
     * Update the specified resource in storage.
     */
    public function reject(Submission $submission)
    {

        // dd($submission);
        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            Alert::error('Error', 'Submission Not Found');
            return redirect()->route('teacher.dashboard')->with('status', 'submission-not-found');
        }
        // update submission
        $submission->update([
            'status' => 'rejected',
        ]);

        Alert::success('Success', 'Submission Rejected Successfully');
        // redirect
        return back()->with('status', 'submission-rejected');

    }


    public function teacherDestroy(Submission $submission)
    {
        // dd(url());
        //delete submission from storage
        Storage::deleteDirectory('upload/submission/' . $submission->folder);

        //delete thumbnail
        if ($submission->thumbnail) {
            $submission->thumbnail->delete();
        }

        //delete from database
        $submission->delete();

        Alert::success('Success', 'Submission Deleted Successfully');
        //redirect
        return redirect()->route('teacher.dashboard')->with('status', 'submission-deleted');


    }

}
