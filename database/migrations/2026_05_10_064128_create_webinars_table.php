<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('topic'); // AI, Web Dev, Laravel, etc.
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->decimal('price', 10, 2)->default(0);
            $table->string('registration_url')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('platform')->nullable(); // Zoom, Google Meet, etc.
            $table->enum('status', ['upcoming', 'ongoing', 'completed', 'draft'])->default('upcoming');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
