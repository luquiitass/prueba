<?php

namespace App\Http\Requests;

use App\Competencia;
use App\Http\Requests\Request;
use App\Temporada;

class TemporadaRequestStore extends Request
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
        $id = $this->input('competencia_id');
        return [
            //
            'nombre'=>'required|unique:temporadas,nombre,NULL,id,competencia_id,'.$id.'|min:4',
            'inicio'=>'required|date',
            'fin'=>'required|date|after:inicio',

        ];
    }
}
