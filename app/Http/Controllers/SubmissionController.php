<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\TemporaryFile;
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
        //validation
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'attachment' => 'required',
        ]);

        $temp_file = TemporaryFile::where('folder', $request->attachment)->first();
        if ($temp_file) {
            Storage::copy('upload/temp/'. $temp_file->folder . '/' . $temp_file->filename, 'upload/submission/' . $temp_file->folder . '/' . $temp_file->filename);
            Submission::create([
                'title' => $request->title,
                'description' => $request->description,
                'folder' => $temp_file->folder,
                'filename' => $temp_file->filename,
                'attachment_type' => $temp_file->type,
                'user_id' => auth()->id(),
            ]);
            Storage::deleteDirectory('upload/temp/' . $temp_file->folder);
            $temp_file->delete();
            return back()->with('status', 'file-uploaded');
        }


        // return Redirect::route('submission.create')->with('status', 'file-uploaded');
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
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Submission $submission)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }

    public function tempUpload(Request $request)
    {

        if($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('attachment',true);
            $file->storeAs('upload/temp/'.$folder, $filename);
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
        //get file
        $file = Storage::get('upload/submission/' . $folder . '/' . $filename);
        //get mime type
        $type = Storage::mimeType('upload/submission/' . $folder . '/' . $filename);
        //create response
        $response = response($file, 200)->header('Content-Type', $type);
        // return response
        return $response;

    }
}
