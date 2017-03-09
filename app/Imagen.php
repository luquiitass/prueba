<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $table = 'imagenes';

    protected $fillable = ['nombre','url_original','url_thubnail'];

}
