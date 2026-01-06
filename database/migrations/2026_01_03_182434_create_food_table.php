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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                ->constrained('restaurants')
                ->onDelete('cascade');
            $table->foreignId('cuisine_id')
                ->nullable()
                ->constrained('cuisines')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('avg_rating', 3, 2)->default(0.00);
            $table->integer('total_orders')->default(0);
            $table->boolean('is_available')->default(true);
            // $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
