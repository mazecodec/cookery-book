<?php

use App\Application\Models\Ingredient;
use App\Application\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_recipes', function (Blueprint $table) {
            $table->integer('required_quantity')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(Ingredient::class);
            $table->foreignIdFor(Recipe::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_recipes');
    }
};
