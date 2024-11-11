<?php

namespace Database\Seeders\ObjectSeeders;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CatalogWithCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catalog::factory()
            ->count(12)
            ->has(Category::factory(5))
            ->create();
    }
}
