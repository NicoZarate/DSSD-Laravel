<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	  {
	    $role_client = Role::where('name', 'client')->first();
	    $role_manager  = Role::where('name', 'manager')->first();

	    $client = new User();
	    $client->name = 'Nico';
	    $client->lastname = 'Z';
	    $client->dni = 111;
	    $client->phone = 111;
	    $client->email = 'cliente@c.com';
	    $client->password = bcrypt('secreto');
	    $client->save();
	    $client->roles()->attach($role_client);

	    $client = new User();
	    $client->name = 'Santi';
	    $client->lastname = 'F';
	    $client->dni = 111;
	    $client->phone = 111;
	    $client->email = 'cliente2@c.com';
	    $client->password = bcrypt('secreto');
	    $client->save();
	    $client->roles()->attach($role_client);

	    $manager = new User();
	    $manager->name = 'Gabi';
	    $manager->lastname = 'R';
	    $manager->dni = 111;
	    $manager->phone = 111;
	    $manager->email = 'manager@m.com';
	    $manager->password = bcrypt('secreto');
	    $manager->save();
	    $manager->roles()->attach($role_manager);
	  }
}
