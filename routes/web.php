<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;

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
})->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function (){
//    Route::get('/', 'MainController@index') -> name('admin.index');
//    Route::resource('/categories', 'CategoryController');
//    Route::resource('/tags', 'TagController');
//    Route::resource('/posts', 'PostController');
});

Route::group(['middleware' =>'guest'], function (){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'App\Http\Controllers\Admin\UserController@logout')->name('logout')->middleware('auth');


Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], ], function() {
    Route::get('admin', 'App\Http\Controllers\Admin\MainController@index') -> name('admin.index');
});

Route::group(['middleware' => ['auth'], 'prefix'=>'admin'], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);

//    Route::get('admin', 'App\Http\Controllers\Admin\MainController@index') -> name('admin.index');
    Route::resource('/categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('/tags', 'App\Http\Controllers\Admin\TagController');
    Route::resource('/posts', 'App\Http\Controllers\Admin\PostController');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
