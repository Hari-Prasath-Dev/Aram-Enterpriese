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
        Schema::create('chit_schemes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chit_id')->constrained('chits')->onDelete('cascade');
            $table->integer('month');
            $table->decimal('starting_bid', 15, 2);
            $table->decimal('amount_payable', 15, 2);
            $table->decimal('dividend', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chit_schemes');
    }
};
