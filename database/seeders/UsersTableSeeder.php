<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Sajjad',
             'email' => 'sajjad@gmail.com',
         ]);

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
         ]);
    }
}
