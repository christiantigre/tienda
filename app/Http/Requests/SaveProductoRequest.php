<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveProductoRequest extends Request
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
            'nombre' => 'required|unique:products|max:25',
            'codbarra'=>'required|unique:products|max:25',
            'cant'=>'required',
            'pre_com'=>'required',
            'pre_ven'=>'required'         
        ];
    }
}
