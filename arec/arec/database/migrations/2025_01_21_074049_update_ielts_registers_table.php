<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ielts_registers', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['academic_qualification', 'field_of_study', 'academic_gpa', 'interested_country']);
            
            // Add new columns
            $table->date('date')->nullable();
            $table->string('location')->nullable();
            $table->string('program_enrollment')->nullable(); // IELTS, PTE, ELLT, Others
            $table->string('program_other')->nullable();
            $table->string('class_type')->nullable(); // Online, Physical
            $table->boolean('deposit_made')->default(false);
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->date('preferred_joining_date')->nullable();
            $table->string('preferred_timing')->nullable();
            $table->boolean('university_applied')->default(false);
            $table->string('university_name')->nullable();
            $table->string('university_other')->nullable();
            $table->string('country_interest')->nullable();
            $table->string('consultancy')->nullable();
            $table->string('reference')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('ielts_registers', function (Blueprint $table) {
            // Add back old columns
            $table->string('academic_qualification')->nullable();
            $table->string('field_of_study')->nullable();
            $table->decimal('academic_gpa', 5, 2)->nullable();
            $table->string('interested_country')->nullable();
            
            // Drop new columns
            $table->dropColumn([
                'date', 'location', 'program_enrollment', 'program_other', 'class_type',
                'deposit_made', 'deposit_amount', 'preferred_joining_date', 'preferred_timing',
                'university_applied', 'university_name', 'university_other', 'country_interest',
                'consultancy', 'reference'
            ]);
        });
    }
};