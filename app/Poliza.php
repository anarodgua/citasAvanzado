<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    protected $fillable = ['tipo','numero','compania_id'];

    public function compania()
    {
        return $this->belongsTo('App\Compania');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
