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
        Schema::create('movies', function(Blueprint $table) {
            $table->increments('movieID');
            $table->string('movieTitle',255);
            $table->string('movieDescription',255);
            $table->string('movieGenre',255);
            $table->date('movieDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
