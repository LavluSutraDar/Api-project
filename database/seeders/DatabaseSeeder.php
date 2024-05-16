<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //FACTORY DATA
        Category::factory(10)->create();
        //post::factory(5)->create();

        //SEEDER DATA
        // $this->call([
        //     CategorySeeder::class
        // ]);
    }
}
