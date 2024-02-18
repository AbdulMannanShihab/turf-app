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
        Schema::create('turf_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->unique();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('update_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->enum('status', ['Active','Inactive'])->default('Active');
            $table->enum('deleted', ['Yes','No'])->default('No');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turf_categories');
    }
};
