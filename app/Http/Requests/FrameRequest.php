<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrameRequest extends FormRequest
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
            'parent_page_id' => ['nullable'],
            'sub_page_id' => ['nullable'],
            'child_page_id' => ['nullable'],
            'label' => ['required'],
            'custom_class' => ['nullable'],
            'image_first' => ['nullable'],
            'frame_type' => ['required'],
            'card_type' => ['nullable'],
            'image' => ['nullable'],
            'title' => ['nullable'],
            'content' => ['nullable'],
            'button_text' => ['nullable'],
            'button_link' => ['nullable'],
        ];
    }
}
