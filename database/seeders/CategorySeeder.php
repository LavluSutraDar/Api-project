<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //FAKE DATA INSERT
        // for($i=1; $i<=10; $i++){
        //     Category::create([
        //         'name'  => fake()->unique()->name(),
        //         'email' => fake()->unique()->email(),
        //         'phone' => fake()->unique()->PhoneNumber(),
        //         'slug'  => fake()->unique()->slug(),
        //     ]);
        // }
        
        //REAL DATA INSERT
        // $json = File::get(path: 'database/json/categories.json');
        // $categories = collect(json_decode($json));

        // $categories->each(function ($category) {
        //      Category::create([
        //      'name'  => $category->name,
        //      'email' => $category->email,
        //      'phone' => $category->phone,
        //      'slug'  => $category->slug,
        //  ]);
        // });



        //single data store
        // Category::create([
        //     'name'=>'Apurva',
        //     'email' => 'Apurvss@gmail.com',
        //     'phone' => '01876407659',
        //     'slug'=>'apurva',
        // ]);

        //MULTIPALE DATA ADD
        // $categories = collect([
        //     [
        //      'name'=>'Rajon',
        //      'email' => 'rajon@gmail.com',
        //      'phone' => '01876407658',
        //      'slug'=>'rajon',
        //     ],

        //     [
        //         'name' => 'Apu',
        //         'email' => 'Apu@gmail.com',
        //         'phone' => '01876407657',
        //         'slug' => 'apu',
        //     ],

        //     [
        //         'name' => 'Arpon',
        //         'email' => 'Arpon@gmail.com',
        //         'phone' => '01876407656',
        //         'slug' => 'arpon',
        //     ],

        //     [
        //         'name' => 'Abisek',
        //         'email' => 'Abisek@gmail.com',
        //         'phone' => '01876407655',
        //         'slug' => 'abisek',
        //     ],
            
        // ]);
        // $categories->each(function($category){
        //     Category::insert($category);  
        // });
    }
}
