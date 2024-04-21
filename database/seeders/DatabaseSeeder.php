<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $categories = [
            [
                'id' => 1,
                'name' => 'Category 1',
                'description' => 'Category 1 description',
                'imagepath' => 'assets\img\c.jpg',
              
            ],
            [
                'id' => 2,
                'name' => 'Category 2',
                'description' => 'Category 2 description',
                'imagepath' => 'assets\img\b.jpg',
                ],
                [
                    'id' => 3,
                'name' => 'Category 3',
                'description' => 'Category 3 description',
                'imagepath' => 'assets\img\f.jpg',
                ]
                ];

        DB::table('categories')->insertOrignore($categories);
        for($i=1;$i<=50;$i++)
        {
            Product::create([
                'name' => 'Product '.$i,
                'description' => 'Product '.$i.' description',
                'quantity' => $i,
                'price' => $i*100,
                'category_id' => rand(1,3),
                ]);
        }
    }
}
