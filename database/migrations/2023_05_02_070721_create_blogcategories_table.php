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
        Schema::create('blogcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('parent_id')->nullable();

            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogcategories');
    }
};
