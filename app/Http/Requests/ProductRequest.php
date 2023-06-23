<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:100',
            'stock' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Product sudah ada',
            'name.required' => 'Masukkan nama Product',
            'name.max:100' => 'Nama Product yang anda masukkan lebih dari 100 kata',
            'stock.required' => 'Masukkan Stock Product',
        ];
    }
}
