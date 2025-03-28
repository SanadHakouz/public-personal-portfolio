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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();  // Primary key
        $table->string('title');
        $table->text('description');
        $table->string('github_link')->nullable();  // Optional GitHub link
        $table->string('documentation_path')->nullable()->after('github_link');
        $table->string('image_path')->nullable()->after('documentation_path');
        $table->timestamps();  // Created/updated timestamps

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
