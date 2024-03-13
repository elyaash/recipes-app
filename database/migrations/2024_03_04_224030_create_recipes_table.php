<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->unique();
            $table->string('slug', 255)->nullable();
            $table->text('description');
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->timestamps();

        });
        Schema::table('recipes', function(Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
