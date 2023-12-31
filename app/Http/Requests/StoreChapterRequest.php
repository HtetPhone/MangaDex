<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
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
        // dd(request()->manga_id);
        $id = request()->manga_id;
        return [
            'title' => 'required|min:3',
            'chapter_no' => ['nullable', 'numeric', Rule::unique('chapters', 'chapter_no')->where(fn (Builder $query) => $query->where('manga_id', $id)) ],
            'manga_id' => 'required|exists:mangas,id',
            'images' => 'required',
            'images.*' => 'file|mimes:png,jpg',
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
