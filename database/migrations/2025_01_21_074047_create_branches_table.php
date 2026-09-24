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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->string('order')->nullable();
            $table->string('title');
            $table->string('branch_name');
            $table->string('slug')->nullable();
            $table->string('category')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
