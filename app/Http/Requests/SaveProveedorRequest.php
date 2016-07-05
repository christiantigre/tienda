<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveProveedorRequest extends Request
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
            'nom_compania' =>'required|unique:proveedors|max:45',
            'ruc' =>'required|unique:proveedors|max:15',
            'telefono' =>'',
            'celular' =>'',
            'fax' =>'required',
            'direccion' =>'required',
            'codpostal' =>'',
            'email' =>'required|unique:proveedors|max:45',
            'pagweb' =>'', 
            'observacion' =>'', 
            'logo' =>'', 
            'country_id' =>'required', 
            'prov_id' =>'required', 
            'isactive_id' =>'required'
        ];
    }
}
