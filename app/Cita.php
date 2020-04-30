<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fechaInicio','fechaFin', 'medico_id', 'paciente_id','localizacion_id','tipoCita'];

    public function medico()
    {
        return $this->belongsTo('App\User', 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo('App\User', 'paciente_id');
    }
    public function localizacion()
    {
        return $this->belongsTo('App\Localizacion');
    }

}
