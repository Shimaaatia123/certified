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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('exam_id')->constrained()->onDelete('cascade');

            $table->text('question_ar');
            $table->text('question_en');

            $table->integer('mark')->default(1);

            $table->enum('type', ['mcq', 'true_false', 'text'])->default('mcq');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
