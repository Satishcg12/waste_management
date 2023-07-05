<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('submission.index');

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
    public function store(StoreSubmissionRequest $request)
    {

        $content = file_get_contents($request->file('attachment'));
        $fileExtension = $request->file('attachment')->extension();
        $fileName = Str::random(40) . '.' . $fileExtension;
        $path = 'attachment/' . $fileName;

        Storage::disk('public')->put($path, $content);

        $submission = Submission::create([
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $path,
            'user_id' => auth()->id(),
        ]);


        return Redirect::route('submission.create')->with('status', 'file-uploaded');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
