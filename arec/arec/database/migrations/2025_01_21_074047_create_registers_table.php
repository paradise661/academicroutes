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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number', 20)->nullable();
            $table->string('course')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('university')->nullable();
            $table->string('address')->nullable();
            $table->string('intake')->nullable();
            $table->string('qualification')->nullable();
            $table->decimal('academic_score', 5, 2)->nullable();
            $table->string('english_score')->nullable();
            $table->integer('passed_year')->nullable();
            $table->text('message')->nullable();
            $table->string('event')->nullable();
            $table->timestamps();

            // Indexes for faster lookups
            $table->index(['email', 'number', 'university']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
