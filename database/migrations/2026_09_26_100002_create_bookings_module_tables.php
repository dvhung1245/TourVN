<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('tours')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_seats')->default(0);
            $table->integer('available_seats')->default(0);
            $table->string('status')->default('Open');
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('departure_id')->constrained('departures')->cascadeOnDelete();
            $table->string('booking_code')->unique();
            $table->decimal('total_price', 15, 2)->default(0);
            $table->string('payment_status')->default('Unpaid');
            $table->string('booking_status')->default('Pending');
            $table->string('contact_name');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('booking_passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->string('name');
            $table->string('type')->default('Adult');
            $table->decimal('price', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_passengers');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('departures');
    }
};
