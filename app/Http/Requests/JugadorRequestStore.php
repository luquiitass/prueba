<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JugadorRequestStore extends Request
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
        if (!$this->has('nombre') ){
            return [
                'user_id'=>'required',
                'posicion_id'=>'required',
                'numero'=>'required'
            ];
        }else{
            return [
                'nombre'=>'required',
                'apellido'=>'required',
                'posicion_id'=>'required',
                'numero'=>'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Debe buscar y seleccionar un usuario',
            'posicion_id.required'  => 'Debe seleccionar una posicion para el jugador',
        ];
    }
}
