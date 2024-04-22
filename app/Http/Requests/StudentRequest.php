<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'=>'required|min:3|max:16',
            'surname'=>'required|min:3|max:16',
            'phone'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__('Vardas yra privalomas'),
            'name.min'=>__('Vardas turi būti ilgesnis nei 2 simboliai'),
            'name'=>__('Vardas yra neteisingas'),
            'surname'=>__('Pavardė yra privaloma ir turi būti nuo 3 iki 16 simbolių')
        ];
    }
}
