<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [WikiController::class, 'index'])->name('home');

Route::get('/wikis', [WikiController::class, 'index'])->name('wikis.index');
Route::get('/wikis/{wiki}', [WikiController::class, 'show'])->name('wikis.show');
Route::get('/wikis/{wiki}/posts/{post}', [PostController::class, 'show'])->name('posts.view');
Route::match(['get', 'post'], '/wikis/{wiki}/search', [WikiController::class, 'search'])->name('wikis.search');
Route::get('/wikis/{wiki}/tags', [WikiController::class, 'tagCloud'])->name('wikis.tags');

Route::get('/embed/wiki/{wiki}', [WikiController::class, 'embed'])->name('wikis.embed');