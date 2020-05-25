<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','surname', 'email', 'password','userType','nuhsa','especialidad_id',
        'poliza_id','centroSanitario_id'];


    public function poliza()
    {
        return $this->belongsTo('App\Poliza','poliza_id');
    }
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad','especialidad_id');
    }
    public function centroSanitario()
    {
        return $this->belongsTo('App\CentroSanitario','centroSanitario_id');
    }
    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
    public function getFullNameAtribute(){
        return $this->name .' '. $this->surname;
    }


    protected $hidden = ['password', 'remember_token'];
}
