<?php

use Illuminate\Database\Seeder;
use App\User;
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
    }
}
