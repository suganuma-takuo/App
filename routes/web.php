<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //PostControllerクラスをインポート。
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
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

Route::get('/customers', [CustomerController::class, 'call']);
Route::get('/customers/wait', [CustomerController::class, 'calling']);

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
    Route::get('/posts/create', 'create')->name('posts/create');
    Route::get('/posts/{post}', 'show')->name('posts/show');
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
    Route::get('/posts/{post}/edit', 'edit')->name('posts/edit');
    
    Route::put('/posts/{post}', 'update')->name('posts/update');
    
    Route::post('/posts', 'store')->name('posts/store');
    
    Route::delete('/posts/{post}', 'delete')->name('posts/delete');
});

Route::controller(RecordController::class)->middleware(['auth'])->group(function(){
    Route::get('/records', 'index')->name('records/index');
    Route::get('/records/create', 'create')->name('records/create');
    Route::get('/records/{record}', 'show')->name('records/show');
    
    Route::get('/records/{record}/edit', 'edit')->name('records/edit');

    Route::put('/records/{record}', 'update')->name('records/update');

    Route::post('/records', 'store')->name('records/store');

    Route::delete('/records/{record}', 'delete')->name('records/delete');
});

require __DIR__.'/auth.php';