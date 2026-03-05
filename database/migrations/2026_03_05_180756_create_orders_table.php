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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name')->nullable();
            $table->string('phone')->nullable();

            $table->enum('order_type', [
                'dine_in',
                'room_service',
                'takeaway',
            ])->default('dine_in');

            $table->foreignId('room_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('total_amount', 10, 2)->default(0);

            $table->enum('status', [
                'pending',
                'preparing',
                'served',
                'cancelled',
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
