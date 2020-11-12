<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulationFormRequest extends FormRequest
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
            'type_id'           =>['required','integer'],
            'montant'           =>['required','number'],
            'duree'             =>['required','number'],
            'mensualite'        =>['required','string'],
            'montantTotal'      =>['required','string']
        ];
    }
}
