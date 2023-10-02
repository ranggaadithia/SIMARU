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
        Schema::table('reschedule_requests', function (Blueprint $table) {
            $table->integer('new_lab_id')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reschedule_requests', function (Blueprint $table) {
            $table->dropColumn('new_lab_id');
        });
    }
};
