<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\product_review;
use App\Models\ProductReview;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_moderator' => true,
         ]);

        
        User::factory(10)->create();
        Product::factory(50)->create();
        ProductReview::factory(100)->create();
    }
}
