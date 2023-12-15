<?php


use App\Http\Controllers\Admin\Blog\AdminBlogPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')
    ->name('blog.')
    ->group(function () {

        Route::prefix("/post")
            ->name("post")
            ->group(function () {

                Route::get("/getPage", [AdminBlogPostController::class, "index"])->name("getPage");

            });

    });
