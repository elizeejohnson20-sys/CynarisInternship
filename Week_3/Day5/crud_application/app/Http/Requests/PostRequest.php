<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->route('post')),
            ],
            'body' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],
        ];
    }
}