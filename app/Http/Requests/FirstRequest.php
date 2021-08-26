<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required | string | min:8 | confirmed',
        ];
    }
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => 'Vous devez entrer un nouveau mot de passe',
            'password.string' => 'Votre mot de passe doit etre composer de lettre, de chiffre et de caractères speciaux',
            'password.min' => 'Votre mot de passe doit etre composé de minimun :min caractères',
            'password.confirmed' => 'Le mot de passe saissir n\'est pas correct',
        ];
    }
}
