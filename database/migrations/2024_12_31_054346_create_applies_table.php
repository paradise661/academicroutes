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
        Schema::create('applies', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->boolean('status')->default(0);
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('country')->nullable();
            $table->string('university')->nullable();
            $table->string('intake')->nullable();
            $table->string('course')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('academic_score')->nullable();
            $table->string('english_score')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('master_certificate')->nullable();
            $table->string('bachelor_certificate')->nullable();
            $table->string('diploma')->nullable();
            $table->string('grade_twelve')->nullable();
            $table->string('email')->nullable();
            $table->string('ielts')->nullable();
            $table->string('passport')->nullable();
            $table->string('cv')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applies');
    }
};
