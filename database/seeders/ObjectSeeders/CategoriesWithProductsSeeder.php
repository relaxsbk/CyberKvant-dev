<?php

namespace Database\Seeders\ObjectSeeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CategoriesWithProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->each(function (Category $category) {
            $products = Product::factory()->count(12)->create(); // Создаём товары

            $products->each(function (Product $product) {
                $count = fake()->numberBetween(1, 3); // Количество изображений (1-3)
                $positions = range(0, 2);
                shuffle($positions); // Перемешиваем позиции

                foreach (range(0, $count - 1) as $index) {
                    $file = UploadedFile::fake()->image('product.jpg', 1000, 1000);
                    $path = $file->store('public/products');

                    Product_image::create([
                        'product_id' => $product->id,
                        'name' => fake()->words(3, true),
                        'url' => Storage::url(str_replace('public/', '', $path)),
                        'position' => $positions[$index], // Уникальная позиция
                    ]);
                }
            });
        });
    }
//    public function run(): void
//    {
//        Category::all()->each(function (Category $category) {
//            $category->products()->saveMany(
//                Product::factory()->count(19)->make()
//            );
//        });
//
//    }
}
