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
        Schema::create('agreement_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('agreement_id')->references('id')->on('agreement')->onDelete('cascade');
            $table->integer('property_id')->references('id')->on('property')->onDelete('cascade');
            $table->longText('terms');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agreement_requests');
    }
};
