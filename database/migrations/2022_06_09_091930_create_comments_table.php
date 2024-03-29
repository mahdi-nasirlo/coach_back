<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up()
    {
        Schema::dropIfExists('shop_reviews');

        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained('users')->cascadeOnDelete();
            $table->morphs('commentable');
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_visible')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
