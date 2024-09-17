<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'frame_id' => ['required'],
            'title' => ['nullable'],
            'content' => ['nullable'],
            'image' => ['nullable'],
            'accent' => ['nullable'],
            'icon' => ['nullable'],
            'linkedin_link' => ['nullable'],
            'order' => ['nullable'],
        ];
    }
}
