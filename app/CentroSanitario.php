<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroSanitario extends Model
{
    protected $fillable =['nombreCentro','provincia','centroPadre'];

    public function users()
    {
     $this->hasMany('App\User');
    }
    public function especialidades()
    {
        $this->hasMany('App\Especialidad');
    }
    public function localizaciones()
    {
        $this->hasMany('App\Localizacion');
    }
    public function centroSanitario()
    {
        $this->belongsTo('App\CentroSanitario');
    }
}
