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
        Schema::create('repat_ingrediants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repat_id');
            $table->unsignedBigInteger('ingrediant_id');

            $table->foreign('ingrediant_id')
                  ->references('id')
                  ->on('ingrediants')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
                  
            $table->foreign('repat_id')   
                  ->references('id')
                  ->on('repats')
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
        Schema::dropIfExists('repat_ingrediants');
    }
};
