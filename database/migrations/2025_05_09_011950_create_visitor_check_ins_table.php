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
        Schema::create('visitor_check_ins', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('visitor_id')->index()->constrained('visitors')->cascadeOnDelete();
            $table->timestamp('check_in_time')->default(now());
            $table->timestamp('check_out_time')->nullable();
            $table->longText("reason")->nullable();
            $table->foreignUlid("employee_id")->nullable()->index()->default(null)->constrained("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_check_ins');
    }
};
