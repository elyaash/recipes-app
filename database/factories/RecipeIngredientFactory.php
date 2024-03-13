<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RecipeIngredient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeIngredient>
 */
class RecipeIngredientFactory extends Factory
{

    //protected $model = RecipeIngredient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ingredient' => fake()->word(),
        ];
    }
}
