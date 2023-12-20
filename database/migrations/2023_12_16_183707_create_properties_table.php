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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('address');
            $table->string('type');
            $table->integer('balcony');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('hall');
            $table->integer('kitchen');
            $table->string('size');
            $table->string('floor');
            $table->string('totalfloor');
            $table->string('city');
            $table->string('state');
            $table->string('pimage');
            $table->integer('price');
            $table->string('status');
            $table->integer('uid')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
