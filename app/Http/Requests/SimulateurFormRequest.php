<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulateurFormRequest extends FormRequest
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
            'type_id'                           =>['required','integer'],
            'nom'                               =>['required','string'],
            'slug'                              =>['required','string','min:15'],
            'statut'                            =>['required','string'],
            'montantMin'                        =>['required','string'],
            'montantMax'                        =>['required','string'],
            'taux'                              =>['required','string'],
            'dureeMin'                          =>['required','string'],
            'dureeMax'                          =>['required','string'],
            'image'                             =>['required','image'],
            'description'                       =>['required','string','min:15'],
        ];
    }
}
