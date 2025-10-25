<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:254'],
            'subject' => ['nullable', 'string'],
            'message' => ['required', 'string'],
            'blog_id' => ['required', 'exists:blogs,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.string' => 'name should be text',
            'email.email' => 'Please enter a valid email',
            'subject.string' => 'Subject should be text',
            'message.required' => 'Please enter the message',
            'message.string' => 'Message should be text',
            'blog_id.required' => 'Please select a blog',
            'blog_id.exists' => 'This blog does not exist',
        ];
    }
}
