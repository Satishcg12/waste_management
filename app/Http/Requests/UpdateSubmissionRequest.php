<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateSubmissionRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            // Aleart error message
            Alert::error('Error', $error);

            return back()->with('status', 'submission-update-failed');
        }

    }
}
