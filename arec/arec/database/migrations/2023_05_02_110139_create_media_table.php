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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('url')->nullable();
            $table->string('extention')->nullable();
            $table->text('fullurl')->nullable();
            $table->text('alt')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('size')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
