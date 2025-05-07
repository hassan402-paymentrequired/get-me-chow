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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->integer('total_amount');
            $table->boolean('is_paid')->default(false);
            $table->unsignedInteger('status')->default(1);
            $table->string('payment_screenshot')->nullable();
            $table->foreignUlid('owner_id')->nullable()->index()->constrained('users');
            $table->foreignUlid('buyer_id')->nullable()->index()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
