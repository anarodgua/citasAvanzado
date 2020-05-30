<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fechaInicio','fechaFin', 'medico_id', 'paciente_id','localizacion_id','tipoCita'];

    protected $dates = ['fechaInicio', 'fechaFin'];

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
    public function setFechaInicioAttribute($date)
    {
        if (is_string($date))
            $this->attributes['fechaInicio'] = Carbon::parse($date);
    }

}
