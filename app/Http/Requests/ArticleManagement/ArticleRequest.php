<?php

namespace App\Http\Requests\ArticleManagement;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'slug' => ['nullable'],
            'title' => ['required'],
            'author' => ['required'],
            'content' => ['required'],
            'article_type' => ['required'],
            'banner_image_path' => ['required'],
            'is_highlight' => ['required'],
            'publish_date' => ['required'],
            'meta_title' => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_keyword' => ['nullable'],
            'meta_image' => ['nullable'],
        ];
    }
}
