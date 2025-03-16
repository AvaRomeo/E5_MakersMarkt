<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        

        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['Sieraden', 'Keramiek', 'Textiel', 'Kunst']),
            'material_usage' => $this->faker->word,
            'production_time' => $this->faker->randomNumber(2),
            'complexity' => $this->faker->randomNumber(1),
            'durability' => $this->faker->randomNumber(1),
            'unique_features' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'image_path' => $this->faker->imageUrl(),
        ];
    }
}
