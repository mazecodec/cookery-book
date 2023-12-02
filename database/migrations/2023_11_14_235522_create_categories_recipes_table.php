<?php

use App\Application\Models\Category;
use App\Application\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_recipes', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Recipe::class);

//            $table->primary(['recipe_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_recipes');
    }
};
