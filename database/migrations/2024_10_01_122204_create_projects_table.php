<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('images')->nullable(); // Store multiple image paths in JSON
            $table->string('video_path')->nullable(); // Optional video path
            $table->text('short_description');
            $table->string('background_image')->nullable(); // Background image path
            $table->string('background_primary_color')->nullable(); // Hex or RGB code
            $table->string('article_color')->nullable(); // Hex or RGB code for the article body
            $table->json('software')->nullable(); // JSON to store selected software
            $table->string('shortline_description')->nullable(); // Shortline description
            $table->text('body'); // Markdown content
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
