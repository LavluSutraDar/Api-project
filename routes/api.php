<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts', postController::class);

// Route::controller(CategoryController::class)->group(function(){
//     Route::get('/message', 'category');
//     Route::post('/categories/store','store');

//  });

