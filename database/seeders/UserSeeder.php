<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory(100)->create();

        User::factory(3)->admin()->create();
        User::factory(10)->auteur()->create();
        User::factory(50)->public()->create();
    }
}
