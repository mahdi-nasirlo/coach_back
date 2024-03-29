<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->unsignedBigInteger('hourly_price');
            $table->string('phone_number')->unique();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->text('about_me');
            $table->string('resume_file')->nullable();
            $table->text('resume')->nullable();
            $table->text('job_experience')->nullable();
            $table->text('education_record')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
