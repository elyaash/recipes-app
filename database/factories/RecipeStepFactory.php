<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RecipeStep;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeStep>
 */
class RecipeStepFactory extends Factory
{
   // protected  $model = RecipeStep::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
           'step' => fake()->sentence(),
       ];
    }
}
