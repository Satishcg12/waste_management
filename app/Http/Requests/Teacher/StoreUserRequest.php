<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
            'grade_id' => 'required|exists:grades,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
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
