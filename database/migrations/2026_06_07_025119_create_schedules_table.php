<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('day');
            $table->time('time');
            $table->string('activity');
            $table->enum('status', ['upcoming', 'ongoing', 'ended'])->default('upcoming');
            $table->timestamps();
        });
    }

        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
