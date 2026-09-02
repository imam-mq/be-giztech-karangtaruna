<?php

namespace App\Http\Requests\WebProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'role' => ['sometimes', 'required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'linked' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}