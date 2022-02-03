<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intro;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TopListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('intro');
});

Route::get('/intro', [Intro::class, 'show']);

Route::get('/sign_up', [SignUpController::class, 'index']) ->name('sign_up');

Route::post('/sign_up', [SignUpController::class, 'add_user']) ->name('sign_up_post');

Route::get('/sign_in', [SignInController::class, 'index'])->name('sign_in');

Route::post('/sign_in', [SignInController::class, 'sign_in'])->name('sign_in_to_explore');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

Route::get('/top_list', [TopListController::class, 'index'])->name('top_list');

Route::get('/post/{id}', [PostController::class, 'index'])->name('go_to_post');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');