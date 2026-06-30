<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65535'],
            'type_id' => ['nullable', 'integer', 'exists:types,id'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['exists:technologies,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'image_description' => ['nullable', 'string', 'max:255'],
            'remove_image' => ['nullable', 'boolean'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'titolo',
            'description' => 'descrizione',
            'type_id' => 'tipologia',
            'technologies' => 'tecnologie',
            'image' => 'immagine',
            'image_description' => 'descrizione immagine',
        ];
    }
}
