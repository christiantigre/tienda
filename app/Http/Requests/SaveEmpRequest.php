<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveEmpRequest extends Request
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
            'nombres' => 'required|max:45',
            'apellidos'=>'required|max:45',
            'fechanacimiento'=>'required|max:10',
            'genero'=>'required|max:9',
            'cedula' => 'required|unique:emps|max:10',
            'telefono' => 'max:15',
            'celular' => 'max:15',
            'email' => 'required|unique:emps|max:45',
            'img' => 'max:255',
            'dir' => 'max:200',
            'estcivil' => 'max:12',
            'sld' => 'max:15,2'
        ];
    }
}
