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
        Schema::create('capacities', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 10);
            $table->enum('type', ['bifacial', 'topcon']);
            $table->float('base_price')->default(0);
            $table->integer('power')->comment('kilowatt (kW)');
            $table->enum('phase', ['single', 'three']);
            $table->float('subsidy')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacities');
    }
};
