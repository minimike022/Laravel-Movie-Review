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
        Schema::create('user_info', function(Blueprint $table) {
            $table->id();
            $table->string('First_Name', 255);
            $table->string('Last_Name', 255);
            $table->string('Middle_Name', 255);
            $table->string('Gender', 50);
            $table->date('birthdate');
            $table->string('address',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
