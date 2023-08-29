<?php


use App\Enums\SubmissionStatus;
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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ["pending","approved","rejected"])->default(SubmissionStatus::PENDING->value);
            $table->string('folder')->nullable();
            $table->string('filename')->nullable();
            $table->enum('attachment_type', ["video","image"])->nullable();

            $table->boolean('commentable')->default(true);
            $table->boolean('likeable')->default(true);

            //cascade delete
            $table->foreignId('user_id')->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
