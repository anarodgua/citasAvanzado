<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //
    protected $fillable = ['name'];

    public function medicos()
    {
        return $this->hasMany('App\Medico');
    }
    public function centroSanitarios()
    {
        return $this->hasMany('App\CentroSanitario');
    }
}
