<?php


use App\Http\Controllers\Admin\Blog\AdminBlogPostController;
use App\Http\Controllers\FileManagementController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')
    ->name('blog.')
    ->group(function () {

        Route::group(["name" => "post", "prefix" => "/post"], function () {

            Route::get("/getPage", [AdminBlogPostController::class, "getPage"])->name("getPage");

            Route::get("/get/{post:slug}", [AdminBlogPostController::class, "get"])->name("get");

            Route::post("/create", [AdminBlogPostController::class, 'create'])->name("create");

            Route::post("/update/{post}", [AdminBlogPostController::class, 'update'])->name("update");

            Route::get("/delete/{post:slug}", [AdminBlogPostController::class, 'delete'])->name('delete');

        });

    });

Route::group(["name" => "file-management.", "prefix" => "file-management"], function () {

    Route::Post("/upload", [FileManagementController::class, "store"])->name("upload");

});
