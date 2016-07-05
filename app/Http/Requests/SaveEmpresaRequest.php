<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveEmpresaRequest extends Request
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
            'nom' => 'required|min:3|string|max:45|regex:/^[a-záéíóúÁÉÍÓÚñàéìòùÀÈÌÒÙÑ1234567890]+$/i',
            'ruc' => 'required|min:13',
            'tlfun' => 'max:10',
            'tlfds' => 'max:10',
            'fax' => 'max:10',
            'cel' => 'max:10',
            'dir' => 'max:45',
            'pagweb' => 'max:45',
            'img' => 'max:255',
            'ln' => 'max:45',
            'lg' => 'max:45',
            'prop' => 'max:45|string',
            'gernt' => 'max:45|string',
            'email' => 'email|max:45',
            'observ' => 'required|max:255'
        ];
    }
}
