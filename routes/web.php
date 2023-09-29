<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MangaChapterController;
use App\Http\Controllers\PageController;

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

Route::controller(MangaChapterController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/MangaDex/manga/{manga:slug}', 'manga')->name('page.manga');
    Route::get('/manga/{manga:slug}/chapter-{chapter:chapter_no?}', 'chapter')
        ->name('page.chapter');
    Route::post('/{manga:slug}/chapter', 'select')->name('select.chapter');
});
//contact page
Route::controller(PageController::class)->group(function(){
    Route::get('/contact', 'contact')->name('contact');
});

//comment and reply
Route::resource('comments', CommentController::class)->middleware('auth');
Route::resource('replies', ReplyController::class)->middleware('auth');

//auth
Auth::routes();

//home
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

//admin dashboard
Route::middleware(['auth', 'admin.access'])->group(function () {
    Route::resource('manga', MangaController::class);

    Route::resource('chapter', ChapterController::class);
    Route::get('/chapters/manage/{manga:slug}', [ChapterController::class, 'manage'])
        ->name('chapters.manage');

    Route::get('/users-list', [UserController::class, 'index'])->name('users.list')->middleware('can:admin-only');

    Route::controller(GenreController::class)->group(function () {
        Route::get('/genres',  'index')->name('genres.index');
        Route::get('/genres/create', 'create')->name('genres.create');
        Route::post('/genres/create', 'store');
        Route::get('/genres/{genre:name}/edit', 'edit')->name('genres.edit');
        Route::put('/genres/{genre:id}', 'update')->name('genres.update');
        Route::delete('/genres/{genre:name}', 'destroy')->name('genres.destroy');
    });
});
