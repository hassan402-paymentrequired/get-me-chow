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
        Schema::create('visitors', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string("name");
            $table->string('phone');
            $table->string('email')->nullable()->unique();
            $table->string('invitation_code')->nullable();
            $table->time('arrived_time')->nullable();
            $table->date('arrived_date')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->unsignedInteger('number_of_visitors')->default(1)->nullable();
            $table->foreignUlid("employee_id")->nullable()->index()->default(null)->constrained("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
