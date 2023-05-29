<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        $categories = [
            [
                'name' => 'Electronics',
                'parent_id' => null,
            ],
            
            [
                'name' => 'Clothings',
                'parent_id' => null,
            ],
            
            [
                'name' => 'Furnitures',
                'parent_id' => null,
            ],
            
            [
                'name' => 'Mobile',
                'parent_id' => 1,
            ],
            [
                'name' => 'Laptop',
                'parent_id' => 1,
            ],
            [
                'name' => 'TV',
                'parent_id' => 1,
            ],
            [
                'name' => "Men's Clothing",
                'parent_id' => 2,
            ],
            [
                'name' => "Women's Clothing",
                'parent_id' => 2,
            ],
            [
                'name' => "Kid's Clothing",
                'parent_id' => 2,
            ],
            [
                'name' => 'Bed',
                'parent_id' => 3,
            ],
            [
                'name' => 'Sofa',
                'parent_id' => 3,
            ],
            [
                'name' => 'Almirah',
                'parent_id' => 3,
            ],
            [
                'name' => 'Dining Table',
                'parent_id' => 3,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
