<?php

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
        Schema::create('categories_recipes', function (Blueprint $table) {
            $table->primary(['recipes_id', 'categories_id']);
            $table->timestamps();

            $table->foreignId('recipes_id')->constrained()->onDelete('cascade');
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
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
