<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\RecipeStep;
use App\Models\RecipeIngredient;
use App\Models\Author;
class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // Auto generate slug
            $model->slug = Str::slug($model->name);
        });

        static::updating(function ($model) {
            // Auto generate slug
            $model->slug = Str::slug($model->name);
        });
    }


    public function steps() {
        return $this->hasMany(RecipeStep::class);
    }

    public function ingredients() {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function author() {
        return $this->belongsTo(Author::class,"author_id","id");
    }
}
