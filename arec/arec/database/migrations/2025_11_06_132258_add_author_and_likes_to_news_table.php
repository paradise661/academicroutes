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
        Schema::table('news', function (Blueprint $table) {
            $table->string('author')->nullable()->after('name'); // add after title (or adjust as needed)
            $table->unsignedInteger('likes')->default(0)->after('author');
            $table->string('position')->nullable()->after('likes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['author', 'likes','position']);
        });
    }
};
