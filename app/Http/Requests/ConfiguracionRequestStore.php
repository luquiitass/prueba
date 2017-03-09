<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfiguracionRequestStore extends Request
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
    { $tabla =$this->get('tabla');
        $nombre = $this->get('nombre');
        return [
            'nombre'=>'required|unique:estados,nombre,NULL,id,tabla,'.$tabla.'|min:4',
            'tabla'=>'required|unique:estados,tabla,NULL,id,nombre,'.$nombre,
        ];
    }

    public function messages()
    {
        $tabla =$this->get('tabla');
        $nombre = $this->get('nombre');
        return
            [
                'nombre.unique'=>'Ya existe un estado con tabla ="'.$tabla.'" y nombre= "'.$nombre.'"',
                'tabla.unique'=>'Ya existe un estado con tabla="'.$tabla.'" y nombre="'.$nombre.'"',
            ];
    }
}
