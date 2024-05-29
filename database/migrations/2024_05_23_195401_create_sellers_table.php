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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('bio')->nullable();
            $table->integer("age")->nullable();
            $table->integer("height")->nullable();
            $table->integer("weight")->nullable();
            $table->string("sexually_active")->nullable();
            $table->string("sex_frequency")->nullable();
            $table->string("birth_control")->nullable();
            $table->string("anal_sex")->nullable();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
