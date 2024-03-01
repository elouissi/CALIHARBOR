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
        Schema::create('ingrediants_ingrediants_quantite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingrediant_id');
            $table->unsignedBigInteger('ingrediant_quantite_id');

            $table->foreign('ingrediant_id')
                  ->references('id')
                  ->on('ingrediants')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->foreign('ingrediant_quantite_id')   
                  ->references('id')
                  ->on('ingrediants__quantites')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingrediants_ingrediants_quantite');
    }
};
