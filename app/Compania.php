<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    protected $fillable = ['nombre'];
    public function polizas()
    {
        return $this->hasMany('App\Poliza');
    }
}
