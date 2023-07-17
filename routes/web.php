<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommentController;
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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

//Route::get('/',[HomeController::class, 'index']);
//Route::get('/home',[HomeController::class, 'index']);
//Route::get('/article',[ArticleController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/manage/article',[ArticleController::class, 'index'])->name('manage.article');
    Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/article/delete/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
    Route::get('/article/detail/{id}', [ArticleController::class, 'show'])->name('article.detail');
    Route::resource('article', ArticleController::class)->middleware('auth');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');


