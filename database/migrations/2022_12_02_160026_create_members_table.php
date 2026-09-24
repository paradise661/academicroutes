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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('sociallink')->nullable();
            $table->string('sociallink1')->nullable();
            $table->string('sociallink2')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('resources')->nullable();
            $table->string('location')->nullable();
            $table->longText('description')->nullable();
            $table->string('order')->nullable();
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
        Schema::dropIfExists('members');
    }
};
