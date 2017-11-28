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

       //incidencia de Nico 1
       $incidente=Incident::create(['user_id'=> 1,
                           'tipo'=> "Casa",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Incendio en mi casa',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Sillon',
                           'descripcionObjeto'=>'quemado' ,
                           'cantidadObjeto'=> 2,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'Televisión',
                           'descripcionObjeto'=>'quemada' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);   
        $req->peticiones($id);

        //incidencia de Nico 2
        $incidente=Incident::create(['user_id'=> 1,
                           'tipo'=> "Auto",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Choque de autos',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Espejo izquierdo',
                           'descripcionObjeto'=>'Roto' ,
                           'cantidadObjeto'=> 4,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'Puerta delantera izquierda',
                           'descripcionObjeto'=>'Rota' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);      
       $req->peticiones($id);

       //incidencia de Nico 3
       $incidente=Incident::create(['user_id'=> 1,
                           'tipo'=> "Objeto Mueble",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Lampara Antigua de oro',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Lampara Antigua',
                           'descripcionObjeto'=>'Rota' ,
                           'cantidadObjeto'=> 4,
                           'incident_id'=> $id           
                          ]);     
       $req->peticiones($id);


       //incidencia de Santi 1
       $incidente=Incident::create(['user_id'=> 2,
                           'tipo'=> "Casa",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Inundación en mi casa',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Cama',
                           'descripcionObjeto'=>'mojada' ,
                           'cantidadObjeto'=> 2,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'Computadora',
                           'descripcionObjeto'=>'mojada' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);   
        $req->peticiones($id);

        //incidencia de Santi 2
        $incidente=Incident::create(['user_id'=> 2,
                           'tipo'=> "Auto",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Choque de autos',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Paragolpes delantero',
                           'descripcionObjeto'=>'Roto' ,
                           'cantidadObjeto'=> 4,
                           'incident_id'=> $id           
                          ]);
       Objeto::create([
                           'nombre'=> 'Capó',
                           'descripcionObjeto'=>'Roto' ,
                           'cantidadObjeto'=> 1,
                           'incident_id'=> $id           
                          ]);      
       $req->peticiones($id);

       //incidencia de Santi 3
       $incidente=Incident::create(['user_id'=> 2,
                           'tipo'=> "Objeto Mueble",
                           'fecha'=> Date("Y-m-d"),
                           'cantidad'=> 2,
                           'descripcion'=> 'Cuadro de Picasso',
                           'estado'=> 'Nuevo'
                           ]);
       $id= $incidente->id;
       Objeto::create([
                           'nombre'=> 'Cuadro',
                           'descripcionObjeto'=>'Roto' ,
                           'cantidadObjeto'=> 4,
                           'incident_id'=> $id           
                          ]);     
       $req->peticiones($id);
    }
}
