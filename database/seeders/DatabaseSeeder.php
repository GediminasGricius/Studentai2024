<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i<100; $i++) {
            Lecturer::factory(1)->hasCourses(rand(1, 3))->create();
        }
        //Lecturer::factory(100)->has( Course::factory()->count(2)->create() )->create();
      //  hasCourses(rand(1,3))->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
