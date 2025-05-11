<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ObjectSeeders\BrandSeeder;
use Database\Seeders\ObjectSeeders\CatalogWithCategoriesSeeder;
use Database\Seeders\ObjectSeeders\CategoriesWithProductsSeeder;
use Database\Seeders\ObjectSeeders\ProviderSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BrandSeeder::class,
            ProviderSeeder::class,
            CatalogWithCategoriesSeeder::class,
//            CategoriesWithProductsSeeder::class
        ]);
        // User::factory(10)->create();

//        User::factory()->create([
//            'firstName' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
