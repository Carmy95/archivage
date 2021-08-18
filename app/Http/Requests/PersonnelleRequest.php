<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelleRequest extends FormRequest
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
            'nom' => 'required | min:2',
            'service' => 'required',
            'prenoms' => 'required | min:2',
            'role' => 'required',
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
            'nom.required' => 'Le Nom est obligatoire pour la création du compte',
            'service.required' => 'Vous devez obligatoirement selectionner le service au quel le personnelle provient...',
            'prenoms.required' => 'Le(s) Prénom(s) est(sont) obligatoire(s) pour la création du compte',
            'role.required' => 'Vous devez obligatoirement selectionner le role du personnelle au sein de l\'entreprise...',
            'min' => 'Vous devez entrer au moins :min caractères pour continuer'

        ];
    }
}
