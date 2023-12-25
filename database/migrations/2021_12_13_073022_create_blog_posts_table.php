<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_author_id');
            $table->foreign("blog_author_id")->references("id")->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger("blog_category_id")->nullable();
            $table->foreign("blog_category_id")->references("id")->on("blog_categories")->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug')->unique();
            $table->bigInteger("view")->default(0);
            $table->longText('content')->nullable();
            $table->date('published_at')->nullable();
            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
