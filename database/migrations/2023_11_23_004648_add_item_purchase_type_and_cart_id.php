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
        Schema::table('item_purchases', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->foreignId('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_purchases', function (Blueprint $table) {
            //
        });
    }
};
