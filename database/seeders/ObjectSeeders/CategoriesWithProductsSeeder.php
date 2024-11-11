<?php

namespace Database\Seeders\ObjectSeeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoriesWithProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->each(function (Category $category) {
            $category->products()->saveMany(
                Product::factory()->count(19)->make()
            );
        });
//        Category::factory(24)
//            ->has(Product::factory()
//                ->count(27)
//            )
//            ->create();
    }
}
