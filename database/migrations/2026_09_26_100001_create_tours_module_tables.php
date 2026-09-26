<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('tour_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->integer('duration_days')->default(1);
            $table->integer('duration_nights')->default(0);
            $table->decimal('price_adult', 15, 2)->default(0);
            $table->decimal('price_child', 15, 2)->default(0);
            $table->string('image')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('transport')->nullable();
            $table->text('highlights')->nullable();
            $table->text('included')->nullable();
            $table->text('excluded')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('Draft');
            $table->timestamps();
        });

        Schema::create('tour_itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained('tours')->cascadeOnDelete();
            $table->integer('day_number');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_itineraries');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('tour_categories');
    }
};
