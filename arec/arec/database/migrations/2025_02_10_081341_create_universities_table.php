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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('abroad_id');
            $table->foreign('abroad_id')->references('id')->on('abroads')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('order')->nullable();
            $table->longText('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
