<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //PostControllerクラスをインポート。
use App\Http\Controllers\RecordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}',[PostController::class,'show']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::post('/posts', [PostController::class, 'store']);

Route::delete('/posts/{post}', [PostController::class, 'delete']);


Route::get('/', [RecordController::class, 'index']);
Route::get('/records/create', [RecordController::class, 'create']);
Route::get('/records/{record}', [RecordController::class, 'show']);
Route::get('/records/{record}/edit', [RecordController::class, 'edit']);

Route::put('/records/{record}', [RecordController::class, 'update']);

Route::post('/records', [RecordController::class, 'store']);

Route::delete('/records/{record}', [RecordController::class, 'delete']);