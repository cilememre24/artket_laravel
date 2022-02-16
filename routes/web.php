<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Intro;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TopListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PostManagementController;
use App\Http\Controllers\PermissionManagementController;
use App\Http\Controllers\TagManagementController;
use App\Http\Controllers\TopListManagementController;
use App\Http\Controllers\CommentManagementController;
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

//INTRO CONTROLLER
Route::get('/intro', [Intro::class, 'show']);

//SIGN UP CONTROLLER
Route::get('/sign_up', [SignUpController::class, 'index']) ->name('sign_up');
Route::post('/sign_up', [SignUpController::class, 'add_user']) ->name('sign_up_post');

//SIGN IN CONTROLLER
Route::get('/sign_in', [SignInController::class, 'index'])->name('sign_in');
Route::post('/sign_in', [SignInController::class, 'sign_in'])->name('sign_in_to_explore');

//EXPLORE CONTROLLER
Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

//TOP LIST CONTROLLER
Route::get('/top_list', [TopListController::class, 'index'])->name('top_list');

//POST CONTROLLER
Route::get('/post/{id}', [PostController::class, 'index'])->name('go_to_post');
Route::get('/post_next/{id}', [PostController::class, 'next'])->name('post_next');
Route::post('/post/comment/{id}', [PostController::class, 'make_comment']) ->name('make_comment');
Route::post('/post/vote/{id}', [PostController::class, 'vote']) ->name('vote');

//PROFILE CONTROLLER
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{type}', [ProfileController::class, 'create_post'])->name('create_post');

//CONTACT CONTROLLER
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


//-----------------------------------------ADMIN PART------------------------------------------------

//USER MANAGEMENT CONTROLLER
Route::get('/user_management', [UserManagementController::class, 'index'])->name('user_management');
Route::get('/users_list/{label}', [UserManagementController::class, 'list_users'])->name('list_users');
Route::get('/create_new_user/{label}', [UserManagementController::class, 'get_create_form'])->name('get_create_form');
Route::post('/create_new_user/{label}', [UserManagementController::class, 'create_user'])->name('create_user');
//POST MANAGEMENT CONTROLLER
Route::get('/post_management', [PostManagementController::class, 'index'])->name('post_management');
Route::get('/posts_list/{type}', [PostManagementController::class, 'list_posts'])->name('list_posts');
//PERMISSION MANAGEMENT CONTROLLER
Route::get('/permission_management', [PermissionManagementController::class, 'index'])->name('permission_management');
//TAG MANAGEMENT CONTROLLER
Route::get('/tag_management', [TagManagementController::class, 'index'])->name('tag_management');
//TOP LIST MANAGEMENT CONTROLLER
Route::get('/top_list_management', [TopListManagementController::class, 'index'])->name('top_list_management');
//COMMENT MANAGEMENT CONTROLLER
Route::get('/comment_management', [CommentManagementController::class, 'index'])->name('comment_management');