<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Jobs\CreaateThumbnailJob;
use App\Models\Teacher;
use App\Models\TemporaryFile;
use App\Models\Thumbnail;
use App\Notifications\teacher\SubmissionCreated as TeacherSubmissionCreated;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Submission;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionController extends Controller
{

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
    public function store(StoreSubmissionRequest $request)
    {

        // get temp file
        $temp_file = TemporaryFile::where('folder', $request->attachment)->first();
        //check if user has temp file
        Storage::copy('upload/temp/' . $temp_file->folder . '/' . $temp_file->filename, 'upload/submission/' . $temp_file->folder . '/' . $temp_file->filename);

        //create thumbnail
        if ($temp_file->type == 'video') {
            // $thumbnail = $this->createThumbnail($temp_file->folder, $temp_file->filename);
            //create thumbnail job
            CreaateThumbnailJob::dispatch($temp_file->folder, $temp_file->filename);
        }

        //create submission
        $submission = Submission::create([
            'title' => $request->title,
            'description' => $request->description,
            'folder' => $temp_file->folder,
            'filename' => $temp_file->filename,
            'attachment_type' => $temp_file->type,
            'user_id' => auth()->id(),
        ]);
        //increase user upload count by 1 if 5 uploads then reset to 0
        if (auth()->user()->upload_count == 5) {
            auth()->user()->update([
                'upload_count' => 1,
            ]);
        } else {
            auth()->user()->increment('upload_count');
        }
        // update last upload date
        auth()->user()->update([
            'last_upload' => now(),
        ]);



        // delete temp file
        Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
        $temp_file->delete();

        // create submission job
        // CreateSubmissionJob::dispatch($request);

        // find teacher with same grade
        $teachers = Teacher::where('grade_id', auth()->user()->grade_id)->get();
        //send email to teachers
        foreach ($teachers as $teacher) {
            $teacher->notify(new TeacherSubmissionCreated($submission));
        }

        // redirect
        return back()->withSuccess('Submission created successfully.');



    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        // if not approved and user is not admin or teacher or owner of submission
        if ($submission->status != 'approved' && !auth()->guard('admin')->user() && !auth()->guard('teacher')->user() && auth()->id() != $submission->user_id) {
            return back()->withError('You are not allowed to view this submission');
        }
        return view('submission.show', compact('submission'));
    }


    public function tempUpload(Request $request)
    {

        //upload file
        if ($request->hasFile('attachment')) {
            $temp_file = TemporaryFile::where('user_id', auth()->id())->first();
            //check if user has temp file
            if ($temp_file) {
                Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
                $temp_file->delete();
            }
            $file = $request->file('attachment');
            $type = $file->getMimeType();
            $type = explode('/', $type)[0];

            // check if file is video or image
            if ($type != 'video' && $type != 'image') {
                return response()->json(['error' => 'Invalid file type. Only video and image files are allowed.'], 400);
            }
            //check if file size is greater than 500mb
            if ($file->getSize() > 500000000) {
                return response()->json(['error' => 'File size is too large.'], 400);
            }
            // time statmp and random file name

            $filename = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $folder = uniqid('attachment', true);
            $file->storeAs('upload/temp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'user_id' => auth()->id(),
                'type' => $type,
            ]);
            return $folder;
        }
        return response()->json(['error' => 'No file attached.'], 400);


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

        //if file is video stream it
        if (Str::startsWith($type, 'video')) {
            $response = response()->stream(function () use ($file) {
                echo $file;
            }, 200, [
                'Content-Type' => $type,
                'Accept-Ranges' => 'bytes',
                'Content-Length' => Storage::size('upload/submission/' . $folder . '/' . $filename),
            ]);
        } else {
            //if file is image return it
            $response = response($file, 200, [
                'Content-Type' => $type,
                'Accept-Ranges' => 'bytes',
                'Content-Length' => Storage::size('upload/submission/' . $folder . '/' . $filename),
            ]);
        }

        return $response;
    }
}
