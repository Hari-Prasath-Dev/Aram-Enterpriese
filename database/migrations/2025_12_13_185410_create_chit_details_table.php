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
        Schema::create('chit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('chits')->cascadeOnDelete();
            $table->integer('auction_count')->nullable();
            $table->decimal('auction_completed_amount', 12, 2)->nullable();
            $table->decimal('dividend', 12, 2)->nullable();
            $table->decimal('payable_amount', 12, 2)->nullable();
            $table->date('last_date')->nullable();
            $table->string('successful_bidder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chit_details');
    }
};
