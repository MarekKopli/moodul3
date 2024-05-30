<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'images.*' => 'image',
            'price' => 'required|numeric|min:0',
            'spiciness' => 'required|numeric|min:1|max:5',
            'vegan' => 'boolean',
            'gluten_free' => 'boolean',
            'vegetarian' => 'boolean'
        ];
    }
}
