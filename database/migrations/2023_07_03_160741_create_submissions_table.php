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
            $table->string('attachment')->nullable();
            $table->enum('attachment_type', ["video","image"])->nullable();

            $table->boolean('commentable')->default(true);
            $table->boolean('likeable')->default(true);

            $table->foreignId('user_id')->constrained();

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
