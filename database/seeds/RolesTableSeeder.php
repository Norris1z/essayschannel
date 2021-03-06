<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role;
        $role_admin->name = 'admin';
        $role_admin->description = 'the admin';
        $role_admin->save();

        $role_editor = new Role;
        $role_editor->name = 'client';
        $role_editor->description = 'the client';
        $role_editor->save();
    }
}
