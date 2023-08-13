<?php

namespace App\Jobs;

use App\Models\Submission;
use App\Models\Thumbnail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class CreaateThumbnailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $folder;
    private $filename;

    /**
     * Create a new job instance.
     */
    public function __construct(string $folder, string $filename)
    {
        $this->folder = $folder;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $thumbnail = $this->createThumbnail($this->folder, $this->filename);
        //update submission thumbnail
        $submission = Submission::where('folder', $this->folder)->first();
        $submission->thumbnail_id = $thumbnail->id;
        $submission->save();

    }

    private function createThumbnail(string $folder, string $filename)
    {
        //thumbnail path
        $thumbnail_path = 'upload/submission/' . $folder . '/thumbnail.jpg';

        //create thumbnail of 16:9 with full width
        FFMpeg::fromDisk('local')
            ->open('upload/submission/' . $folder . '/' . $filename)
            ->getFrameFromSeconds(1)
            ->addFilter(function ($filters) {
                $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 360));
            })
            ->export()
            ->toDisk('local')
            ->save('upload/submission/' . $folder . '/thumbnail.jpg');

        //return
        return Thumbnail::create([
            'folder' => $folder,
            'filename' => 'thumbnail.jpg',
        ]);

    }
}
