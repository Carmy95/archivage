<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'nom' => 'required',
            'service' => 'required',
            'document' => 'required',
            'statu' => 'required',
            'type' => 'required',
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
            'nom.required' => 'L\' intitulé du document est obligatoire pour continuer...',
            'service.required' => 'Vous devez obligatoirement selectionner le service au quel le document provient...',
            'document.required' => 'Vous devez obligatoirement selectionner le document...',
            'statu.required' => 'Vous devez obligatoirement selectionner le statut du document...',
            'type.required' => 'Vous devez obligatoirement selectionner le type du document...',

        ];
    }
}
