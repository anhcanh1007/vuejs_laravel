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
        Schema::create('account_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->double('account_number', 50);
            $table->string('branch', 100);
            $table->foreignId('bank_id')
                ->constrained('banks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_banks');
    }
};