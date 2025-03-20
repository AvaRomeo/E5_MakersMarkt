<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductReviewFactory extends Factory
{
    protected $model = \App\Models\ProductReview::class;
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
            'buyer_id' => \App\Models\User::inRandomOrder()->first()->id,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'comment' => $this->faker->realText(200),
        ];
    }
}
