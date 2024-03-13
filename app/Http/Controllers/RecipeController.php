<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Author;
use App\Models\RecipeStep;
use App\Models\RecipeIngredient;

class RecipeController extends Controller
{
    public function index(Request $request) {

        $query = Recipe::query();

        //Author Email
        $authorEmail = $request->get("email");
        if ($authorEmail) {
            $author = Author::where("email", $authorEmail)->get("id")->first();
            if ($author) {
                $query->where("author_id", $author->id);
            } else {
                //@TODO -If no author is found for the provided email, should we return a 'no-data
                //Why to run other queries?
                //$query->where("author_id", -1);
                return ["data" => []];
            }
        }
        $idList = [];
        //Keyword
        $keyword = $request->get("keyword");
        if ($keyword) {
            $steps = RecipeStep::where("step", "like", "%{$keyword}%")->get("recipe_id")->map(function ($step) {
                return $step->recipe_id;
            })->unique()->toArray();
            $idList = $steps;
        }
        //Ingredient
        $ingredient = $request->get("ingredient");
        if ($ingredient || $keyword) {
            $result = RecipeIngredient::where(function ($query) use ($keyword,$ingredient) {
                //Keyword search also done in the ingredient
                if ($keyword) {
                    $query->orWhere('ingredient', "like", "%{$keyword}%");
                }
                if ($ingredient){
                    $query->orWhere("ingredient", "like", "%{$ingredient}%");
                }
            })->get("recipe_id")->map(function($step) {
                return $step->recipe_id;
            })->unique()->toArray();
            if ($result) {
                $idList += $result;
            }
        }
        // OR condition for keyword or
        if ($keyword || $idList) {
            $query->where(function ($query) use ($keyword,$idList) {
                        if ($keyword) {
                            $query->orWhere('name', "like", "%{$keyword}%")
                                ->orWhere("description", "like", "%{$keyword}%");
                        }
                        if ($idList) {
                            $query->orWhereIn("id", $idList);
                        }
           });
        };

        //page
        $currentPage = $request->input('page', 1);
        try {
            return $query->with(
                [
                    'author' => function($query) {
                        return  $query->select(["id","email"]);
                    },
                    'steps',
                    'ingredients'

               ])->paginate(10, ['*'], 'page', $currentPage);
        }catch (\Exception $ex) {
            //log error
            logger("Recipe > API > List > Error > {$ex->getMessage()}");
            return $this->onFail($ex->getMessage());
        }
    }

    public function viewBySlug(Request $request,$slug) {
        try {
            return Recipe::where("slug",$slug)->with(['steps','author','ingredients'])->first(['id','name','description']);
        } catch (\Exception $ex) {
            //log error
            logger("Recipe > API > View > {$slug} > Error > {$ex->getMessage()}");
            return $this->onFail();
        }
    }

    private function onFail() {
        return response()->json([
            'status' => 'error',
            'error'  => 'Internal Server Error',
         ], 500);
    }
}
