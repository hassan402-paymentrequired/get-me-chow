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
        Schema::create('account_numbers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('account_name');
            $table->foreignUlid('user_id')->index()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_numbers');
    }
};
