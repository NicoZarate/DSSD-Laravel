<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
	protected $fillable = ['incident_id','nombre','cantidadObjeto','descripcionObjeto','created_at','updated_at'];

    public function incident()
    {
        return $this->belongsTo('App\Incident');
    }
}
