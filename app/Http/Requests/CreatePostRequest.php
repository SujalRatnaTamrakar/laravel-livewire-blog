<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'tags'  => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required!',
        ];
    }
}
