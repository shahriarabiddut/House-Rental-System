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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid')->references('id')->on('users')->onDelete('cascade');
            $table->integer('propertyid')->references('id')->on('property')->onDelete('cascade');
            $table->date('dateofSigning')->nullable();
            $table->date('dateCheckOut')->nullable();
            $table->integer('amount');
            $table->integer('amountStatus')->nullable();
            $table->longText('terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreements');
    }
};
