<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Submission;
use App\Notifications\user\SubmissionAccepted;
use App\Notifications\user\SubmissionReject;
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


        $title = 'Delete Submission!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


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
        ]);
        // update submission
        $submission->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);
        // redirect
        return back()->withSuccess('Submission Updated Successfully');

    }


    /**
     * Update the specified resource in storage.
     */
    public function approve(Submission $submission)
    {

        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            return redirect()->route('teacher.dashboard')->withError('Submission Not Found');
        }
        // update submission
        $submission->update([
            'status' => 'approved',
        ]);

        // notify user
        $submission->user->notify(new SubmissionAccepted($submission));
        // redirect
        return back()->withSuccess('Submission Approved Successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function reject(Submission $submission, Request $request)
    {

        // dd($submission);
        if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
            return redirect()->route('teacher.dashboard')->with('error', 'Submission Not Found');
        }
        // update submission
        $submission->update([
            'status' => 'rejected',
        ]);

        // notify user
        $submission->user->notify(new SubmissionReject($submission, $request->reject_reason));

        // redirect
        return back()->withSuccess('Submission Rejected Successfully');

    }


    public function teacherDestroy(Submission $submission)
    {
        // dd(url());
        //delete submission from storage
        // Storage::deleteDirectory('upload/submission/' . $submission->folder);

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
