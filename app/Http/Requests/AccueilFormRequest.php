<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccueilFormRequest extends FormRequest
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
            'agence_id'                                 =>['required','integer'],
            'identifiantClient'                         =>['required','string','min:3'],
            'etatCivil'                                 =>['required','string'],
            'montant'                                   =>['required','string'],
            'mensualite'                                =>['required','string'],
            'taux'                                      =>['required','string'],
            'nom'                                       =>['required','string','min:3'],
            'prenom'                                    =>['required','string'],
            'dateNaissance'                             =>['required','date'],
            'email'                                     =>['required','email'],
            'pays'                                      =>['required','string'],
            'telephone'                                 =>['required'],
            'ville'                                     =>['required','string'],
            'motif'                                     =>['required','string'],
            'dateRdv'                                   =>['required','date']
        ];
    }
}
