<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Check if documentation_path column doesn't exist before adding it
            if (!Schema::hasColumn('projects', 'documentation_path')) {
                $table->string('documentation_path')->nullable()->after('github_link');
            }

            // Check if image_path column doesn't exist before adding it
            if (!Schema::hasColumn('projects', 'image_path')) {
                $table->string('image_path')->nullable()->after('documentation_path');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'documentation_path')) {
                $table->dropColumn('documentation_path');
            }

            if (Schema::hasColumn('projects', 'image_path')) {
                $table->dropColumn('image_path');
            }
        });
    }
};
