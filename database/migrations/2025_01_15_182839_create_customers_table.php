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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('full_name', 75);
            $table->string('email')->nullable();
            $table->string('mobile', 10);
            $table->string('pincode', 6);
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('company_name', 75)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
