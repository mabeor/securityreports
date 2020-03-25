<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { //Roles de la aplicacion...
        $role = new Role();
        $role->name = 'Administrador';
        $role->description = 'Rol para coordinadores TP';
        $role->save();

        $role = new Role();
        $role->name = 'Coordinador';
        $role->description = 'Rol para coordinadores Metropoli';
        $role->save();

        $role = new Role();
        $role->name = 'Supervisor';
        $role->description = 'Rol para supervisores Metropoli';
        $role->save();
    }
}
