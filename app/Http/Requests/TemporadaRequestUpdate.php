<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TemporadaRequestUpdate extends Request
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
        $id_temp = $this->route()->parameters()['temporada']->id;
        return [
            //
            'nombre'=>'required|unique:temporadas,nombre,'.$id_temp.',id,competencia_id,'.$id.'|min:4',
            'inicio'=>'required|date',
            'fin'=>'required|date|after:inicio',

        ];
    }
}
