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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->boolean('status')->default(0);
            $table->string('slug')->nullable();
            $table->string('company_name')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('official_email')->nullable();
            $table->string('website')->nullable()->nullable();
            $table->string('registration_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('registration_certificate_path')->nullable();
            $table->string('pan_certificate_path')->nullable();
            $table->string('tourism_certificate_path')->nullable();
            $table->string('nrb_certificate_path')->nullable();
            $table->boolean('has_tax_clearance')->default(false);
            $table->string('tax_clearance_path')->nullable();
            $table->string('company_logo_path')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('residence_address')->nullable();
            $table->string('designation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
