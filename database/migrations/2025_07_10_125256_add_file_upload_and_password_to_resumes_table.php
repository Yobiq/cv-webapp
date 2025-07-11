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
        Schema::table('resumes', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('dwonloadLink');
            $table->string('original_filename')->nullable()->after('file_path');
            $table->string('password')->nullable()->after('original_filename');
            $table->boolean('is_protected')->default(false)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn(['file_path', 'original_filename', 'password', 'is_protected']);
        });
    }
};
