<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Temporada;
use Carbon\Carbon;

class TorneoRequestUpdate extends Request
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
        $id_temporada = $this->input('temporada_id');
        $id_torneo = $this->route()->parameters()['torneo']->id;
        $temporada = Temporada::find($id_temporada);
        return [
            //
            'nombre'=>'required|unique:torneos,nombre,'.$id_torneo.',id,temporada_id,'.$id_temporada.'|min:4',
            'inicio'=> 'required|date|after:'.$temporada->inicio->format('d-m-Y').'|before:'.$temporada->fin->format('d-m-Y'),
            'fin'=>'required|date|after:'.$temporada->inicio->addDay(-1)->format('d-m-Y').'|before:'.$temporada->fin->addDay(1)->format('d-m-Y'),
            'categorias'=>'required|exists:categorias,id'
        ];
    }
}