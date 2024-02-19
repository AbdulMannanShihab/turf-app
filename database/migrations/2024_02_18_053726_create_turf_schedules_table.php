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
        Schema::create('turf_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('turf_category_id');
            $table->string('shift_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('price');
            $table->decimal('booking_price');
            $table->enum('status', ['Active','Inactive'])->default('Active');
            $table->enum('deleted', ['Yes','No'])->default('No');
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('update_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turf_schedules');
    }
};
