<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'full_name' => ['required'],
            'phone' => ['required'],
            'role' => ['required'],
            'solution' => ['required'],
            'position' => ['required'],
            'industry' => ['required'],
            'email' => ['required', 'email'],
            'company' => ['required'],
        ];
    }
}
