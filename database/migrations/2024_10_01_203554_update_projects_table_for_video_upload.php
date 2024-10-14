<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn('background');
            $table->dropColumn('software_used');

            // Add a new column for video path
            $table->string('video_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add the columns back (in case of rollback)
            $table->string('background')->nullable();
            $table->json('software_used')->nullable();

            // Remove the video column
            $table->dropColumn('video_path');
        });
    }
};
