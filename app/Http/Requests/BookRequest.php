<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:books,name,' . $this->book,
            'isbn' => 'required|string|max:255|unique:books,isbn,' . $this->book,
            'value' => 'required|numeric|min:0',
        ];
    }
}
