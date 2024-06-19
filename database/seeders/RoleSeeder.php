<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //------------------------
        /*
            Role::create([
            'name' => 'admin',
            'description' => 'Administrator role',
        ]);

            Role::create([
                'name' => 'auteur',
                'description' => 'Author role',
            ]);

            Role::create([
                'name' => 'public',
                'description' => 'Public role',
            ]);
        */

        //------------------------
        $role=new Role();
        $role->name="Admin";
        $role->description="role admin";
        $role->save();

        $role=new Role();
        $role->name="Auteur";
        $role->description="role auteur";
        $role->save();


        $role=new Role();
        $role->name="Public";
        $role->description="role public user";
        $role->save();

    }
}
