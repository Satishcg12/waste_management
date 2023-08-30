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

class DeleteSubmissionFromStorage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $folder;
    /**
     * Create a new job instance.
     */
    public function __construct(Submission $submission)
    {
        $this->folder = $submission->folder;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // delete folder
        Storage::deleteDirectory('upload/submission/' . $this->folder);
    }
}
