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
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function ($table) {
                $table->foreignId('chit_id')->nullable()->constrained('chits')->nullOnDelete()->change();
                $table->dateTime('password_expire_at')->nullable();
                $table->string('role')->nullable();
                $table->string('mobile')->nullable();
                $table->string('location')->nullable();
                $table->string('nominee_name')->nullable();
                $table->string('nominee_number')->nullable();
                $table->string('pin_number')->nullable();
                $table->dateTime('last_login_at')->nullable();
                $table->tinyInteger('status')->default(1);

            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['chit_id']);
            $table->dropColumn(['password_expire_at','mobile','last_login_at','status','location','nominee_name','nominee_number','pin_number','role']);

        });
    }
};
