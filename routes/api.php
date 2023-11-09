<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('posts', [PostController::class, 'index'])->middleware('auth:sanctum');
// Route::post('posts', [PostController::class, 'store'])->middleware('auth:sanctum');
// Route::get('posts/{id}', [PostController::class, 'show'])->middleware('auth:sanctum');
// Route::put('posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');
// Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('auth:sanctum');