<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
	protected $fillable = ['incident_id','nombre','cantidad','descripcion','created_at','updated_at'];

    public function incident()
    {
        return $this->belongsTo('App\Incident');
    }
}
