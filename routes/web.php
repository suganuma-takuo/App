<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //PostControllerクラスをインポート。
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
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


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){return view('start');});

Route::get('/user', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts', 'index')->name('posts/index');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    
    Route::put('/posts/{post}', 'update')->name('update');
    
    Route::post('/posts', 'store')->name('store');
    
    Route::delete('/posts/{post}', 'delete')->name('delete');
});

Route::controller(RecordController::class)->middleware(['auth'])->group(function(){
    Route::get('/records', 'index')->name('records/index');
    Route::get('/records/create', 'create')->name('create');
    Route::get('/records/{record}', 'show')->name('show');
    
    Route::get('/records/{record}/edit', 'edit')->name('edit');

    Route::put('/records/{record}', 'update')->name('update');

    Route::post('/records', 'store')->name('store');

    Route::delete('/records/{record}', 'delete')->name('delete');
});

require __DIR__.'/auth.php';