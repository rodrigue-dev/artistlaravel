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
        Schema::create('artist_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->nullable();
            $table->foreignId('artist_id')->nullable();
            $table->enum('level',['langue maternelle','Débutant','intermediare','Courant']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_languages');
    }
};
