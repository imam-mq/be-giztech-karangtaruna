<?php

namespace App\Http\Requests\WebProfile;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimoniRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'perusahaan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
