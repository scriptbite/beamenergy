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
        Schema::create('panels', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            // Foreign key constraint
            $table->integer('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->string('name');
            $table->enum('type', ['dcr', 'non_dcr']);
            $table->enum('technology', ['bifacial', 'topcon']);
            $table->float('price');
            $table->integer('power')->comment('Watt-peak (Wp)');
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
        Schema::dropIfExists('panels');
    }
};
