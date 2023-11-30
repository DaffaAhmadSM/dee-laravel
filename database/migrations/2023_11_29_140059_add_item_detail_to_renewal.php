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
            $table->foreignId('item_list_id')->after('id')->constrained('item_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('renewals', function (Blueprint $table) {
            $table->dropForeign(['item_list_id']);
        });
    }
};
