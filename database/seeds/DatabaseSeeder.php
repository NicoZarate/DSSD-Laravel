<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//esto se supone que es para iniciar tablas con valores iniciales, pero no lo puedo hacer andar.
class DatabaseSeeder extends Seeder {

    public function run()
    {
        Model::unguard();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
       // $this->call(ContextoSeeder::class);
        Model::reguard();
    }

}