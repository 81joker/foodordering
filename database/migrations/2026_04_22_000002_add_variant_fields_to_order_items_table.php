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
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('food_variant_id')
                ->nullable()
                ->after('food_id')
                ->constrained('food_variants')
                ->nullOnDelete();
            $table->string('food_variant_name')->nullable()->after('food_variant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropConstrainedForeignId('food_variant_id');
            $table->dropColumn('food_variant_name');
        });
    }
};
