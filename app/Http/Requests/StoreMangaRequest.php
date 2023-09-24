<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMangaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:100',
            'summary' => 'required|min:3',
            'cover' => 'file|required|mimes:png,jpg',
            'genres' => 'required'
        ];
    }

    //error messages
    public function messages()
    {
        return [
            'cover.required' => 'Please Select Cover Image',
            'genres.required' => 'A single genre is requied at least'
        ];
    }
}
