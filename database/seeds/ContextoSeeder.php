<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Incident;
use App\Objeto;
use App\Http\Controllers\IncidentController;

class ContextoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $req= new IncidentController();

       $incidente=Incident::create(['user_id'=> 1,
                           'tipo'=> "Casa",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'se me prendio fuego todo',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'sillon',
                           'descripcionObjeto'=>'se quemo' ,
                           'cantidadObjeto'=> 2,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'televisión',
                           'descripcionObjeto'=>'se quemo' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);   
        $req->peticiones($id);
        $incidente=Incident::create(['user_id'=> 1,
                           'tipo'=> "Auto",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'se me prendio fuego todo',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'ruedas',
                           'descripcionObjeto'=>'se quemo' ,
                           'cantidadObjeto'=> 4,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'GPS',
                           'descripcionObjeto'=>'se quemo' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);      
       $req->peticiones($id);
    }
}
