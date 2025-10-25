<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|numeric',
            'image' => 'nullable|image|extensions:jpg,png,jpeg,webp|mimes:jpg,png,jpeg,webp',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'category'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the blog title',
            'name.string' => 'blog title should be text',
            'description.required' => 'Please enter blog description',
            'description.string' => 'Blog description should be a text',
            'category.required' => 'Please select blog category',
            'image.image' => 'Please enter a valid image',
            'image.extensions' => 'The image should be png, jpg, jpeg or webp',
            'image.mimes' => 'This is not an image',
        ];
    }
}
