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
        Schema::create('donation_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clothing_item_id')->constrained()->onDelete('cascade');
            $table->foreignId('donor_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['available', 'donated', 'closed', 'requested'])->default('available');
            $table->timestamps();
            $table->text('description')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('region')->nullable();
            $table->string('contacts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_posts');
    }
};
