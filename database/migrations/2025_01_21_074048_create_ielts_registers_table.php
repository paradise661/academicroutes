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
        Schema::create('ielts_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('academic_qualification')->nullable(); // +2, Bachelor, Masters
            $table->string('field_of_study')->nullable();
            $table->decimal('academic_gpa', 5, 2)->nullable();
            $table->string('interested_country')->nullable();
            $table->timestamps();

            // Indexes for faster lookups
            $table->index(['email', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ielts_registers');
    }
};