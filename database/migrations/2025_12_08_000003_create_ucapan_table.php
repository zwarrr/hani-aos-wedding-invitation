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
        // Check if table already exists before creating
        if (!Schema::hasTable('ucapan')) {
            Schema::create('ucapan', function (Blueprint $table) {
                $table->id();
                $table->string('nama', 255);
                $table->text('pesan');
                $table->enum('kehadiran', ['hadir', 'tidak_hadir', 'masih_ragu']);
                $table->timestamp('created_at')->useCurrent();
                
                $table->index('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucapan');
    }
};
