<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index' )->name('profile');
Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update' )->name('profile.update');


//Routes for posts

Route::get('/index', [App\Http\Controllers\PostController::class , 'index' ] )->name('posts.index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create' )->name('posts.create');
Route::post('/post/store', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts/show/{slug}', 'App\Http\Controllers\PostController@show' )->name('posts.show');
Route::get('/posts/edit/{id}', 'App\Http\Controllers\PostController@Edit' )->name('posts.edit');
Route::post('/post/update/{id}', 'App\Http\Controllers\PostController@update' )->name('post.update');
Route::get('/post/destroy/{id}', 'App\Http\Controllers\PostController@destroy' )->name('post.destroy');
Route::get('/posts/trashed', 'App\Http\Controllers\PostController@postsTrashed' )->name('posts.trashed');
Route::get('/post/hdelete/{id}', 'App\Http\Controllers\PostController@hdelete' )->name('post.hdelete');
Route::get('/post/restore/{id}', 'App\Http\Controllers\PostController@restore' )->name('post.restore');


// routes for tags

Route::get('/tags', 'App\Http\Controllers\TagController@index' )->name('tags.index');
Route::get('/tags/create', [App\Http\Controllers\TagController::class , 'create'] );
Route::post('/tags/store', 'App\Http\Controllers\TagController@store' )->name('tags.store');
Route::get('/tags/edit/{id}', 'App\Http\Controllers\TagController@edit' )->name('tags.edit');
Route::post('/tags/update/{id}', 'App\Http\Controllers\TagController@update' )->name('tags.update');
Route::get('/tags/destroy/{id}', 'App\Http\Controllers\TagController@destroy' )->name('tags.destroy');

//routes for users
Route::get('/users', 'App\Http\Controllers\UserController@index' )->name('users');
Route::get('/user/create', [App\Http\Controllers\UserController::class , 'create'] )->name('user.create');
Route::post('/user/store', 'App\Http\Controllers\UserController@store' )->name('user.store');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy' )->name('user.destroy');
