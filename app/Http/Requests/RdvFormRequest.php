<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RdvFormRequest extends FormRequest
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
            'simulation_id'                             =>['required','integer'],
            'agence_id'                                 =>['required','integer'],
            'identifiantClient'                         =>['required','string','min:3'],
            'etatCivil'                                 =>['required','string'],
            'nom'                                       =>['required','string','min:3'],
            'prenom'                                    =>['required','string'],
            'dateNaissance'                             =>['required','string|date'],
            'email'                                     =>['required','string|email'],
            'pays'                                      =>['required','string'],
            'telephone'                                 =>['required','number'],
            'ville'                                     =>['required','string'],
            'motif'                                     =>['required','string'],
            'dateRdv'                                   =>['required','string|date'],
            'heure'                                     =>['required','string']
        ];
    }
}
