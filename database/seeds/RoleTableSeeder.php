<?php

use Illuminate\Database\Seeder;
use DentalS\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role= new Role();
       $role->rol= "Admin";
       $role->save();

       $role= new Role();
       $role->rol= "Aventas";
       $role->save();



    }
}
