<?php

namespace App\Http\Requests\File;

use App\Http\Requests\RequestWrapper;

class FileRequest extends RequestWrapper
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'mimes:csv', 'max:51200'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'file.required' => 'Please upload a file.',
            'file.file' => 'The uploaded file must be a valid file.',
            'file.mimes' => 'Only CSV files are allowed.',
            'file.max' => 'The file size must not exceed 50MB.',
        ];
    }
}
