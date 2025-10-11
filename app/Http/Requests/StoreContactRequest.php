<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter the first name',
            'first_name.string' => 'First name should be text',
            'last_name.required' => 'Please enter the last name',
            'last_name.string' => 'Last name should be text',
            'email.required' => 'Please enter the email',
            'email.email' => 'Please enter a valid email',
            'subject.required' => 'Please enter the subject',
            'subject.string' => 'Subject should be text',
        ];
    }
}
