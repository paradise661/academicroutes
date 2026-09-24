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
        Schema::table('ielts_registers', function (Blueprint $table) {
            $table->string('timing_other')->nullable()->after('preferred_timing');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ielts_registers', function (Blueprint $table) {
            $table->dropColumn('timing_other');
        });
    }
};
