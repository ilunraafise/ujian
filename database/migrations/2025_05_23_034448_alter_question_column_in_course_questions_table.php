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
        Schema::table('course_questions', function (Blueprint $table) {
            $table->text('question')->change(); // ubah dari VARCHAR(255) ke TEXT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_questions', function (Blueprint $table) {
            $table->string('question', 255)->change(); // rollback ke string 255 jika perlu
        });
    }
};
