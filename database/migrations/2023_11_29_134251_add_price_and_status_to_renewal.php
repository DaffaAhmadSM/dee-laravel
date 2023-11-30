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
        Schema::table('renewals', function (Blueprint $table) {
            $table->string('status');
            $table->integer('price_total');
            $table->integer('down_payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('renewals', function (Blueprint $table) {
            $table->dropColumn(['status', 'price_total', 'down_payment']);
        });
    }
};
