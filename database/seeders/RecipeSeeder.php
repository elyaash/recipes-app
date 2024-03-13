<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Author;
use App\Models\RecipeIngredient;
use App\Models\RecipeStep;
class RecipeSeeder extends Seeder
{
    protected $authors;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->authors = Author::factory(10)->create();
        Recipe::factory(40)->create()->each(function ($recipe) {
            $recipe->author()->associate($this->authors->random(1)->first())->save();
            $recipe->ingredients()->saveMany(RecipeIngredient::factory(10)->make());
            $recipe->steps()->saveMany(RecipeStep::factory(8)->make());
        });
    }
}
