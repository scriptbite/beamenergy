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
        Schema::create('inverters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            // Foreign key constraint
            $table->integer('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->string('name');
            $table->enum('phase', ['single', 'three']);
            $table->enum('type', ['string', 'micro', 'central', 'hybrid', 'off-grid', 'grid-tied']);
            $table->float('price');
            $table->integer('power')->comment('kilowatt (kW)');
            $table->text('description');
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
        Schema::dropIfExists('inverters');
    }
};
