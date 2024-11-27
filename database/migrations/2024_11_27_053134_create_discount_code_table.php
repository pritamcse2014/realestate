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
        Schema::create('discount_code', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('discount_code', 255)->nullable();
            $table->string('discount_price', 255)->nullable();
            $table->string('expiry_date', 255)->nullable();
            $table->tinyInteger('type')
                ->default(0)
                ->comment('0: Percentage, 1: Amount');
            $table->tinyInteger('usages')
                ->default(1)
                ->comment('1: Unlimited, 2: One Time');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_code');
    }
};
