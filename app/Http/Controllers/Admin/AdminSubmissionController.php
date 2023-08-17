<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Submission;
use App\Notifications\user\SubmissionAccepted;
use App\Notifications\user\SubmissionReject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Notification;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSubmissionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function adminEdit(Submission $submission)
    {
        return view('admin.submission.edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(UpdateSubmissionRequest $request, Submission $submission)
    {
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
        // update submission
        $submission->update([
            'status' => 'approved',
        ]);


        // send email to user
        $submission->user->notify(new SubmissionAccepted($submission));
        // redirect
        return back()->withSuccess('Submission Approved Successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function reject(Submission $submission, Request $request)
    {
        // dd($submission->user);
        // update submission
        $submission->update([
            'status' => 'rejected',
        ]);

        // send email to user
        $submission->user->notify(new SubmissionReject($submission, $request->reject_reason));
        // redirect
        return back()->withSuccess('Submission Rejected Successfully');

    }


    public function adminDestroy(Submission $submission)
    {
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
        return redirect()->route('admin.dashboard')->with('status', 'submission-deleted');

    }

}
