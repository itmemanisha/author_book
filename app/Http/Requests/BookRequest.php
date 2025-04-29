<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:books,code,' . $this->book,
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),
            'edition' => 'nullable|string|max:255',
            'language' => 'required|string|max:255',
            'copies' => 'required|integer|min:1',
            'pages' => 'required|integer|min:1',
            'description' => 'nullable|string',

        ];
    }
}
