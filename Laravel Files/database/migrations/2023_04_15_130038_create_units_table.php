<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('address');
            $table->integer('price');
            $table->string('type', '10'); //apartment or ..
            $table->string('for_what', '10');
            $table->date('date_of_posting');
            $table->boolean('is_available');
            $table->json('imag');
            $table->json('components'); // bedrooms & living rooms & bathroom & kitchen

            $table->foreignId('posted_by')->references('id')->on('users');
            $table->foreignId('feature_id')->references('id')->on('features');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
