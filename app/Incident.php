<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = ['user_id','tipo','fecha','cantidad','descripcion', 'created_at','updated_at'];

    //tiene muchos objetos

    public function objects()
    {
        return $this->hasMany('App\Object');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
