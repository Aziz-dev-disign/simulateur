<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenceUpdateFormRequest extends FormRequest
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
            'nom'       =>['required','string','min:3'],
            'code'      =>['required','string','unique:agences,code,'. request()->route('agence')->id],
            'email'     =>['required','email'],
            'telephone' =>['required','string'],
            'ville'     =>['required','string']
        ];
    }
}
