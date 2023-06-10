<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'category_id' => [
                'required',
            ],
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'bail',
            ],
            'slug' => [
                'required',
                'unique:posts,slug,',
                'string',
                'min:3',
                'max:255',
                'bail',
            ],
            'body' => [
                'required',
                'string',
                'min:30',
                'bail',
            ],
        ];
    }
}
