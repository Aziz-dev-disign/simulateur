<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'role_id'  => [
                'integer'],
            'name'     => [
                'required'],
            'email'    => [
                'required',
                'unique:users'],
            'statu' => [
                'required',
                'integer'],
            'password' => [
                'required'],
        ];
    }
}
