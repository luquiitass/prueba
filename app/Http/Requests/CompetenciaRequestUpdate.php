<?php

namespace App\Http\Requests;

use App\Competencia;
use App\Http\Requests\Request;

class CompetenciaRequestUpdate extends Request
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

        $id = $this->route()->parameters()['competencia']->id;


        return [
            //
            'nombre'=>'required|unique:competencias,nombre,'.$id.'|min:4',
            'descripcion'=>'required',
            'administradores'=>'required'
        ];
    }
}
