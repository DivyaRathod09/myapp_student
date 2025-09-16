<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student') ? $this->route('student')->id : null;

        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:students,email,' . $studentId,
            'mobile_no' => 'nullable|string|max:15',
            'stream'    => 'nullable|string|max:100',
        ];
    }
}
