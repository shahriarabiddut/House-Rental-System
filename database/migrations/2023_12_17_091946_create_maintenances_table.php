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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->longText('task');
            $table->longText('reply')->nullable();
            $table->string('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->string('tenant_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
