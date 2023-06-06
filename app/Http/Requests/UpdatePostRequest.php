<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => 'max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'string|max:500',
            'content' => 'string',
            'category_id' => [Rule::exists('categories', 'id')],
            'tags' => 'string'
        ];
    }
    //Update
    //Delete
}
