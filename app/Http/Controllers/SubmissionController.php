<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\TemporaryFile;
use App\Models\Thumbnail;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('submission.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //delete temp file if validation fails

        $validation= Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'attachment' => 'required|exists:temporary_files,folder',
        ]);
        if ($validation->fails()) {
            $temp_file = TemporaryFile::where('folder', $request->attachment)->first();
            if ($temp_file) {
                Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
                $temp_file->delete();
            }
            return back()->withErrors($validation)->withInput();
        }

        //remove temp file if validation fails
        if (!$validation) {
            $temp_file = TemporaryFile::where('folder', $request->attachment)->first();
            if ($temp_file) {
                Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
                $temp_file->delete();
            }
            return back()->withErrors($validation);
        }




        $temp_file = TemporaryFile::where('folder', $request->attachment)->first();

        if ($temp_file) {
            //move file from temp to submission
            Storage::copy('upload/temp/' . $temp_file->folder . '/' . $temp_file->filename, 'upload/submission/' . $temp_file->folder . '/' . $temp_file->filename);

            //create thumbnail
            if ($temp_file->type == 'video') {
                $thumbnail = $this->createThumbnail($temp_file->folder, $temp_file->filename);
            } else {
                $thumbnail = null;
            }



            //create submission
            Submission::create([
                'title' => $request->title,
                'description' => $request->description,
                'folder' => $temp_file->folder,
                'filename' => $temp_file->filename,
                'attachment_type' => $temp_file->type,
                'thumbnail_id' => $thumbnail?->id,
                'user_id' => auth()->id(),
            ]);

            //delete temp file
            Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
            $temp_file->delete();

            // redirect
            return back()->with('status', 'file-uploaded');
        }


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

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return view('submission.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function adminEdit(Submission $submission)
    {
        return view('admin.submission.edit', compact('submission'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function teacherEdit(Submission $submission)
    {
        return view('teacher.submission.edit', compact('submission'));
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
    public function teacherUpdate(UpdateSubmissionRequest $request, Submission $submission)
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
    public function updateStatus(UpdateSubmissionRequest $request, Submission $submission)
    {
        // validate
        request()->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);
        // update submission
        $submission->update([
            'status' => $request->status,
            //
            'status_change_by_id' => auth()->guard('teacher')->user()->id ?? null,
        ]);
        // pending, approved, rejected
        return back()->with('status', 'submission-updated');

    }

    public function destroy(Submission $submission)
    {
        // delete submission
        $submission->delete();
        // delete file
        Storage::deleteDirectory('upload/submission/' . $submission->folder);
        // redirect
        return back()->with('status', 'submission-deleted');
    }

    public function tempUpload(Request $request)
    {

        //upload file
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('attachment', true);
            $file->storeAs('upload/temp/' . $folder, $filename);
            $type = $file->getMimeType();
            $type = explode('/', $type)[0];


            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'type' => $type,
            ]);
            return $folder;
        }
        return '';

    }

    public function tempDelete()
    {
        $temp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($temp_file) {
            Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
            $temp_file->delete();
        }
        return '';
    }

    public function getAttachment(string $folder, string $filename)
    {
        // dd(Storage::exists('upload/submission/' . $folder . '/' . $filename));
        //check if file exists
        if (!Storage::exists('upload/submission/' . $folder . '/' . $filename)) {
            abort(404);
        }

        // dd(auth()->guard('admin')->user());
        //check if user is admin or teacher
        $submission = Submission::where('folder', $folder)->first();
        // check submission
        if (!$submission) {
            abort(404);
        }
        if (auth()->guard('admin')->user()) {
            //get file
            $file = Storage::get('upload/submission/' . $folder . '/' . $filename);
            //get mime type
            $type = Storage::mimeType('upload/submission/' . $folder . '/' . $filename);
            //create response
            $response = response($file, 200)->header('Content-Type', $type);
        } elseif (auth()->guard('teacher')->user()) {
            //filter submission by grade
            //check if teacher is in the same grade as the submission
            if (auth()->guard('teacher')->user()->grade_id != $submission->user->grade_id) {
                abort(404);
            }


        } elseif (auth()->user()) {
            //filter submission by user id
            //check if user is the owner of the submission
            if (auth()->id() != $submission->user_id) {
                abort(404);
            }
        } else {
            //filter submission with status approved
            //check if submission is approved
            if ($submission->status != 'approved') {
                abort(404);
            }
        }
        //get file
        $file = Storage::get('upload/submission/' . $folder . '/' . $filename);
        //get mime type
        $type = Storage::mimeType('upload/submission/' . $folder . '/' . $filename);
        //create response
        $response = response($file, 200)->header('Content-Type', $type);
        return $response;
    }
}
