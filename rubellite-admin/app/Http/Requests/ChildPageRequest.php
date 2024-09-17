<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildPageRequest extends FormRequest
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
            'sub_page_id' => 'nullable',
            'title' => ['required'],
            'image' => ['nullable'],
            'header' => ['nullable'],
            'subtitle' => ['nullable'],
            'description' => ['nullable'],

            'meta_title' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keyword' => ['nullable'],
            'meta_image' => ['nullable'],
        ];
    }
}
