<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\RecipeStep;
use App\Models\RecipeIngredient;
use App\Models\Author;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph,
            //'author_id'  => (Author::factory(1)->make())->first()->id,
        ];
    }
}
