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
            $table->foreignId('item_purchase_id')->nullable()->after('id')->constrained('item_purchases')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('renewals', function (Blueprint $table) {
            $table->dropForeign(['item_purchase_id']);
            $table->dropColumn('item_purchase_id');
        });
    }
};
