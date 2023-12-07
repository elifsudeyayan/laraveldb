<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
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
            'name'=> 'required|string|min:3',
            'email'=> 'required|email',
            #'sucject'=> 'required',
            'message'=> 'required',

           ];
    }
    public function messages(): array
    {
        return [

            'name.required' => 'İsim Soyisim Zorunlu',
            'name.string' => 'İsim Soyisim karakterlerden oluşmalı',
            'name.min' => 'İsim Soyisim Minimum 3 karakterden oluşmalıdır',
            'email.required' => 'E-posta Zorunlu',
            'email.email' => 'Geçersiz bir email adresi',
            #'sucject.required'=> 'Konu kısmı boş geçilemez',
            'message.required' => 'Mesaj kısmı boş geçilemez',



          ];
    }
}
