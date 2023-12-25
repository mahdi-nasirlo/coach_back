<?php


use App\Http\Controllers\Admin\Blog\AdminBlogPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')
    ->name('blog.')
    ->group(function () {

        Route::group(["name" => "post", "prefix" => "/post"], function () {

            Route::get("/getPage", [AdminBlogPostController::class, "getPage"])->name("getPage");

            Route::get("/get/{post}", [AdminBlogPostController::class, "get"])->name("get");

            Route::post("/create", [AdminBlogPostController::class, 'create']);

            Route::post("/update/{post}", [AdminBlogPostController::class, 'update']);

        });

    });
