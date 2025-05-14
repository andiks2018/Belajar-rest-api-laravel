<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
           //validasi data yang masuk
         return [
            // kalau mau unique
            //'text' => 'required|min:20|unique:quotes',

            'text' => 'required|min:20',
            'author' => 'required|min:10,',
        ];
    }
}
