<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListDocumentFormRequest extends FormRequest
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
            'categorie_id'      =>['required','integer'],
            'nomDoc'            =>['required','string','min:3']
        ];
    }
}
