<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Incident;
use App\Objeto;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::all()->count()==0){
                        User::create([
                        'name' => 'grupo',
                        'email' => 'g@30.com',
                        'password' => bcrypt('grupo12'),
                        'username'=>'grupo',
                        'lastname'=>'treinta',
                        'dni'=>121212,
                        'phone'=>1111111
                        
                         ]);
                         User::create([
                        'name' => 'gabi',
                        'email' => 'g@y.com',
                        'password' => bcrypt('grupo12'),
                        'username'=>'gabi',
                        'lastname'=>'r',
                        'dni'=>121212,
                        'phone'=>1111111
                        ]);
                          User::create([
                        'name' => 'nico',
                        'email' => 'n@h.com',
                        'password' => bcrypt('grupo12'),
                        'username'=>'nico',
                        'lastname'=>'zeta',
                        'dni'=>121212,
                        'phone'=>1111111
                       ]);

           }

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

    }



}
