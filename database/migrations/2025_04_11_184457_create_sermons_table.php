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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('body')->nullable();
            $table->foreignId('series_id');  // Assuming a sermon belongs to a series
            $table->string('preacher');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();  // URL to the audio file
            $table->string('pdf_file')->nullable();  // PDF file for sermon notes or transcript
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamp('date_preached')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sermons');
    }
};
