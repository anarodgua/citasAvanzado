<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    protected $fillable = ['consulta','centroSanitario_id'];

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
    public function centroSanitario()
    {
        return $this->belongsTo('App\CentroSanitario');
    }
}
