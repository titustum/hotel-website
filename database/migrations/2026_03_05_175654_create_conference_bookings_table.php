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
        Schema::create('conference_bookings', function (Blueprint $table) {
            $table->id();

    $table->foreignId('conference_room_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('client_name');
    $table->string('phone');
    $table->string('email')->nullable();

    $table->date('event_date');

    $table->integer('attendees')->nullable();

    $table->enum('status', [
        'pending',
        'confirmed',
        'cancelled'
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
        Schema::dropIfExists('conference_bookings');
    }
};
