<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        //if key is from foreign check validation
        return [
            'title' => ['required', 'string', 'unique:books,title'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'publication_year'=> ['required', 'integer', 'min:100', 'max:2023'],
            'isbn'=> ['required', 'string', 'min:13', 'max:13', 'unique:books,isbn'],
            'categories' => ['exists:categories,id']
        ];
    }
}
