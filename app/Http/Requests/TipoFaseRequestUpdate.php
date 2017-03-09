<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TipoFaseRequestUpdate extends Request
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
        $id_tipo = $this->route()->parameters()['tipoFase']->id;
        return [
            'tipo_torneo_id'=>'required',
            'nombre'=>'required|min:4|unique:tipos_fase,nombre,'.$id_tipo.',id',
            'descripcion'=>'',
        ];
    }
}
