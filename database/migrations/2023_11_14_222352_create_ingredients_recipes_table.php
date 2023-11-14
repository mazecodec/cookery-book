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
        Schema::create('ingredients_recipes', function (Blueprint $table) {
            $table->integer('required_quantity')->nullable();
            $table->string('unit')->nullable();
            $table->primary(['recipes_id', 'ingredients_id']);

            $table->timestamps();

            $table->foreignId('recipes_id')->constrained()->onDelete('cascade');
            $table->foreignId('ingredients_id')->constrained()->onDelete('cascade');
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
