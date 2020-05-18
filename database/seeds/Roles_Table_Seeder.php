<?php

use Illuminate\Database\Seeder;
use App\Role;

class Roles_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' =>'admin']);
        Role::create(['name' =>'author']);
        Role::create(['name' =>'user']);
    }
}
