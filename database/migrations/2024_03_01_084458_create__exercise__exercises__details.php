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
        Schema::create('_exercise__exercises__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('exercise_details_id');

            $table->foreign('exercise_id')
                  ->references('id')
                  ->on('exercises')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign ('exercise_details_id')
                  ->references('id')
                  ->on('exercises__details')
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
        Schema::dropIfExists('_exercise__exercises__details');
    }
};
