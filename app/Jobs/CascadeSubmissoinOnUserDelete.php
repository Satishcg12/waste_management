<?php

namespace App\Jobs;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CascadeSubmissoinOnUserDelete implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $submission;
    /**
     * Create a new job instance.
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // delete submission file
        if (Storage::exists('upload/submission/' . $this->submission->folder . '/' . $this->submission->filename)) {
            Storage::deleteDirectory('upload/submission/' . $this->submission->folder);
        }

    }
}
