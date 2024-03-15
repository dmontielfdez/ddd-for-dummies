<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'food',
            function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string('status');
                $table->string('name');
                $table->integer('proteins')->nullable();
                $table->integer('fats')->nullable();
                $table->integer('carbs')->nullable();
                $table->timestamps();
            }
        );

        Schema::create(
            'food_portion',
            function (Blueprint $table) {
                $table->string('foodId')->primary();
                $table->integer('type');
                $table->integer('amount')->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
