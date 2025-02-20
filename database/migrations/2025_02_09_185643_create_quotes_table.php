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
        Schema::create('quotes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            // Foreign key constraint
            $table->string('full_name', 150);
            $table->string('mobile', 10);
            $table->string('pincode', 6);
            $table->tinyInteger('subsidy_option');
            $table->enum('technology', ['bifacial', 'topcon']);

            $table->integer('category_id');
            //$table->foreign('category_id')->references('id')->on('categories');

            $table->integer('capacity_id');
            $table->foreign('capacity_id')->references('id')->on('capacities');

            $table->integer('panel_id');
            $table->foreign('panel_id')->references('id')->on('panels');

            $table->integer('inverter_id');
            $table->foreign('inverter_id')->references('id')->on('inverters');

            $table->enum('status', ['received', 'pending', 'scheduled', 'in_progress', 'completed', 'cancelled', 'on_hold', 'rejected'])->default('received');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
