<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMasyarakatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'unique:masyarakats,username'
            ],
            'password' => [
                'required',
                'confirmed'
            ],
            'nik' => [
                'required',
                'unique:masyarakats,nik',
                'min:16',
                'max:16'
            ],
            'name' => [
                'required'
            ],
            'telp' => [
                'required'
            ],
            "password_confirmation" => [
                "required",
                "same:password"
            ]
        ];
    }
}
