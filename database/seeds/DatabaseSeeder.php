<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Model::unguard();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
       	$this->call(ContextoSeeder::class);
        Model::reguard();
    }

}