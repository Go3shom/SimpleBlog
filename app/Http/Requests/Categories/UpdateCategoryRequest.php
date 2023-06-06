<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'unique:categories,name,' . $this->category->id,
                'min:3',
                'max:255',
                'bail',
            ],
            'slug' => [
                'required',
                'string',
                'unique:categories,slug,' . $this->category->id,
                'min:3',
                'max:255',
                'bail',
            ],
        ];
    }
}
