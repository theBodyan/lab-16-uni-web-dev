<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CommentController;

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

Route::get('/forums', [ForumController::class, 'getAll']);
Route::post('/forum', [ForumController::class, 'create']);
Route::get('/forum/{id}', [ForumController::class, 'get']);
Route::put('/forum/{id}', [ForumController::class, 'update']);
Route::delete('/forum/{id}', [ForumController::class, 'delete']);

Route::get('/comments', [CommentController::class, 'getAll']);
Route::post('/comment', [CommentController::class, 'create']);
Route::get('/comment/{id}', [CommentController::class, 'get']);
Route::put('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'delete']);

Route::get('/topics', [TopicController::class, 'getAll']);
Route::post('/topic', [TopicController::class, 'create']);
Route::get('/topic/{id}', [TopicController::class, 'get']);
Route::put('/topic/{id}', [TopicController::class, 'update']);
Route::delete('/topic/{id}', [TopicController::class, 'delete']);

Route::get('/files', [FileController::class, 'getAll']);
Route::post('/file', [FileController::class, 'create']);
Route::get('/file/{id}', [FileController::class, 'get']);
Route::put('/file/{id}', [FileController::class, 'update']);
Route::delete('/file/{id}', [FileController::class, 'delete']);
