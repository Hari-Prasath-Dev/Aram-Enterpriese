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
        Schema::table('chits', function (Blueprint $table) {
            $table->string('duration_months')->nullable()->after('start_date');
            $table->date('auction_held_on')->nullable()->after('duration_months');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chits', function (Blueprint $table) {
            $table->dropColumn(['duration_months', 'auction_held_on']);
        });
    }
};
