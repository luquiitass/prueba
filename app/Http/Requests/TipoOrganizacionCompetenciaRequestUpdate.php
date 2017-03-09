<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TipoOrganizacionCompetenciaRequestUpdate extends Request
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
        $id_tipo = $this->route()->parameters()['tipoOrganizacionCompetencia']->id;
        return [
            'nombre'=>'required|min:4|unique:tipos_organizacion_competencia,nombre,'.$id_tipo.',id',
            'descripcion'=>'required|min:10'
        ];
    }
}
