<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChapterRequest extends FormRequest
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
            'title' => 'required|min:3',
            'manga_id' => 'required|exists:mangas,id',
            'images' => 'required',
            'images.*' => 'file|mimes:png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'manga_id.required' => 'Please Select the Manga',
            'manga_id.exists' => 'Please Select the Manga',
            'images.required' => 'Please Select Chapter images',
            // 'images.*.mimes:png,jpg' => 'Invalid Image extensions'
        ];
    }
}
