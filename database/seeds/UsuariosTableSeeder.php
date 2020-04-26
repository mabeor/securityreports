<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mauricio Ortiz';
        $user->username = 'mauri';
        $user->password = '$2y$10$OMPDocnfij2rpWOETd7MTuIXllTVMlzWG4SVxRCCgqskdiOYCVC6q';
        $user->save();
    }
}
