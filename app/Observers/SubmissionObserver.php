<?php

namespace App\Observers;

use App\Jobs\DeleteSubmissionFromStorage;
use App\Models\Submission;
use App\Models\Teacher;

class SubmissionObserver
{
    /**
     * Handle the Submission "created" event.
     */
    public function created(Submission $submission): void
    {
        if ($submission->user->email != null) {
            $submission->user->notify(new \App\Notifications\user\SubmissionCreated($submission));
        }
        $teachers = Teacher::where('grade_id', $submission->user->grade_id)->get();
        foreach ($teachers as $teacher) {
            $teacher->notify(new \App\Notifications\teacher\SubmissionCreated($submission));
        }
    }

    /**
     * Handle the Submission "updated" event.
     */
    public function updated(Submission $submission): void
    {
        //
    }

    /**
     * Handle the Submission "deleted" event.
     */
    public function deleted(Submission $submission): void
    {
        DeleteSubmissionFromStorage::dispatch($submission);
    }

    /**
     * Handle the Submission "restored" event.
     */
    public function restored(Submission $submission): void
    {
        //
    }

    /**
     * Handle the Submission "force deleted" event.
     */
    public function forceDeleted(Submission $submission): void
    {
        //
    }
}
