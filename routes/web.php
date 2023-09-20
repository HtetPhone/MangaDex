<?php

use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ChapterController;
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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/MangaDex/manga/{manga:slug}', 'manga')->name('page.manga');
    Route::get('/manga/{manga:slug}/chapter-{chapter:chapter_no?}', 'chapter')
    ->name('page.chapter');
    Route::post('/{manga:slug}/chapter', 'select')->name('select.chapter');
});

Route::resource('comments', CommentController::class)->middleware('auth');
Route::resource('replies', ReplyController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::middleware(['auth', 'admin.access'])->group(function () {
    Route::resource('manga', MangaController::class);

    Route::resource('chapter', ChapterController::class);

    Route::get('/chapters/manage/{manga:slug}', [ChapterController::class, 'manage'])
    ->name('chapters.manage');

    Route::get('/users-list', [UserController::class, 'index'])->name('users.list')->middleware('can:admin-only');
});

