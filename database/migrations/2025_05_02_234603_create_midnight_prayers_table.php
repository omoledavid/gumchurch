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
        Schema::create('midnight_prayers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('recording_date');
            $table->integer('duration')->default(0); // in seconds
            $table->string('zoom_recording_id')->unique();
            $table->string('file_url');
            $table->string('file_type');
            $table->bigInteger('file_size')->default(0);
            $table->string('play_url');
            $table->string('download_token');
            $table->string('status')->default('pending');
            $table->string('local_file_path')->nullable();
            $table->json('chapter_markers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midnight_prayers');
    }
};
