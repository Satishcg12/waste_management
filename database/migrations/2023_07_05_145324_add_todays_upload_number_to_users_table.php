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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('TermsAndConditions')->default(false);
            $table->enum('upload_count', [0,1,2,3,4,5])->default(0);
            $table->timestamp('last_upload')->default(now());
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('upload_count');
        });
    }
};
