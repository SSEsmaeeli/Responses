<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
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
            'name' => config('sample_user.client.name'),
            'email' => config('sample_user.client.email'),
            'password' => bcrypt(config('sample_user.client.password')),
        ]);

        User::factory()->create([
            'name' => config('sample_user.admin.name'),
            'email' => config('sample_user.admin.email'),
            'password' => bcrypt(config('sample_user.admin.password')),
            'role' => UserRole::ADMIN->value,
        ]);
    }
}
