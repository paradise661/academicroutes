<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->string('icon')->nullable();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};