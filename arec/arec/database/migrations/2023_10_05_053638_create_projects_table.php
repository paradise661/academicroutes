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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('url')->nullable();
            $table->integer('category')->nullable();
            $table->string('file')->nullable(); 
            $table->string('date')->nullable();
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};