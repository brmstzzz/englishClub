<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            // Menambahkan foreign key untuk relasi ke event dan schedule
            $table->foreignId('event_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('schedule_id')->nullable()->constrained()->onDelete('cascade');
            
            // Mengubah email dan jenis_kelamin menjadi nullable (opsional)
            $table->string('email')->nullable()->change();
            $table->string('jenis_kelamin')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropForeign(['schedule_id']);
            $table->dropColumn(['event_id', 'schedule_id']);
            
            $table->string('email')->nullable(false)->change();
            $table->string('jenis_kelamin')->nullable(false)->change();
        });
    }
};