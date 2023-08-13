<?php

namespace App\Http\Requests;

use App\Models\TemporaryFile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StoreSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'description' => ['required', 'string', 'max:255', 'min:3'],
            'attachment' => ['required', 'string', 'exists:temporary_files,folder'],
            'areyousure' => ['required', 'accepted'],
        ];
    }

    public function withValidator($validator)
    {
        if ($this->user()->upload_count >= 5) {
            $validator->errors()->add('upload_count', 'You have reached the maximum upload count.');
        }

        if ($validator->fails()) {
            $tempFile = TemporaryFile::where('folder', $this->attachment)->first();
            if ($tempFile) {
                Storage::deleteDirectory('upload/temp/' . $tempFile->folder);
                $tempFile->delete();
            }

            $error = $validator->errors()->first();
            // Aleart error message
            Alert::error('Error', $error);

            return back()->with('status', 'file-upload-failed');
        }

    }
}
