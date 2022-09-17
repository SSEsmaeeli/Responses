<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected array $seeders = [
        UsersTableSeeder::class
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(
//            $this->seeders
//        );

        for($i=1; $i<=500; $i++) {
            Post::query()->create([
                'user_id' => 1,
                'title' => Str::random(),
                'body' => Str::random(),
            ]);
        }
    }
}
