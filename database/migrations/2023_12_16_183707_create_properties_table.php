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
            $table->integer('kitchen');
            $table->string('size');
            $table->string('floor');
            $table->string('totalfloor');
            $table->string('city');
            $table->string('state');
            $table->string('pimage')->nullable();
            $table->string('pimage1')->nullable();
            $table->string('pimage2')->nullable();
            $table->string('pimage3')->nullable();
            $table->string('pimage4')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->integer('featured');
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
