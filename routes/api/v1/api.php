<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Blog\BlogPostController;
use App\Http\Controllers\Blog\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/blog')
    ->name('blog.')
    ->group(function () {

        Route::prefix("/post")
            ->name("post")
            ->group(function () {

                Route::get("/getPage", [BlogPostController::class, 'getPage']);
                Route::get("/get/{post}", [BlogPostController::class, 'get']);

                Route::middleware("auth:sanctum")
                    ->group(function () {

                        Route::post("/create", [BlogPostController::class, 'create']);
                        Route::post("/update/{post}", [BlogPostController::class, 'update']);

                    });

            });

    });


Route::prefix('/auth')
    ->name('auth.')
    ->group(function () {

        Route::post("/login", [AuthenticationController::class, 'Login']);
        Route::post("/register", [AuthenticationController::class, 'Register']);

    });
