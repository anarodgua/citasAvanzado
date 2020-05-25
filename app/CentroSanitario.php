<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroSanitario extends Model
{

    protected $table = 'centroSanitarios';
    protected $fillable =['nombreCentro','provincia','centroPadre'];

    public function users()
    {
     $this->hasMany('App\User');
    }
    public function especialidads()
    {
        $this->hasMany('App\Especialidad');
    }
    public function localizacions()
    {
        $this->hasMany('App\Localizacion');
    }
    public function centroSanitario()
    {
        $this->belongsTo('App\CentroSanitario');
    }
}
