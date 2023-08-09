<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // update submission
        $submission->update([
            'status' => 'approved',
        ]);


            Alert::success('Success', 'Submission Approved Successfully');
            Alert::toast($submission->title.' Approved Successfully', 'success');

        // redirect
        return back()->with('status', 'submission-approved');

    }

    /**
     * Update the specified resource in storage.
     */
    public function reject(Submission $submission)
    {
        // update submission
        $submission->update([
            'status' => 'rejected',
        ]);
        // redirect
        return back()->with('status', 'submission-rejected');

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
        //redirect
        return redirect()->route('admin.dashboard')->with('status', 'submission-deleted');

    }

}
