<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//esto se supone que es para iniciar tablas con valores iniciales, pero no lo puedo hacer andar.
class DatabaseSeeder extends Seeder {

    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        Model::reguard();
    }

}