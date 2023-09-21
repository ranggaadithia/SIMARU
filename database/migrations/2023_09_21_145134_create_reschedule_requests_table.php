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
        Schema::create('reschedule_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lab_booking_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('new_booking_date');
            $table->string('new_start_time');
            $table->string('new_end_time');
            $table->text('reason_for_request');
            $table->enum('status', ['accepted', 'rejected', 'requested', 'forced'])->default('requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reschedule_requests');
    }
};
