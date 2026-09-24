<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalientFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('salient_features', function (Blueprint $table) {
            $table->id(); 
            $table->string('title')->unique();;
            $table->longText('description')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('salient_features'); 
    }
}