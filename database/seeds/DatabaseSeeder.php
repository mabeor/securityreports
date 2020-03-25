<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class); //se agrego para el seeder de relacion de roles y usuarios
    	$this->call(CuentaTableSeeder::class);
    }
}
