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
        Schema::create('survey_requests', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('full_name', 75);
            $table->string('email')->nullable();
            $table->string('mobile', 10);
            $table->string('pincode', 6);
            $table->string('city', 50);
            $table->enum('status', ['pending', 'scheduled', 'in_progress', 'completed', 'cancelled', 'on_hold', 'rejected'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_requests');
    }
};
