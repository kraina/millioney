<?php

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

Route::get('/',                     'HomeController@index'     )->name('index');
Route::get('/blog',                 'HomeController@blog'      )->name('blog');
Route::get('/contact',              'HomeController@contact'   )->name('contact');
Route::get('/about',                'HomeController@about'     )->name('about');
Route::get('/listings',             'HomeController@properties')->name('listings');
Route::get('/single',               'HomeController@single'    )->name('single');
Route::get('/property/{property}',  'HomeController@property'  )->name('property');
Route::get('/categories',           'HomeController@categories')->name('categories');
Route::get('/category/{category}',  'HomeController@category'  )->name('category');

//Auth::routes();
/*
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'home',
    'as' => 'home.',

],
    function () {
        Route::get('/home',         'HomeController@home'      )->name('home');
        Route::get('/properties',   'HomeController@properties')->name('listings');
    });
*/
Auth::routes();

Route::get('/home',     'HomeController@home'      )->name('home')->middleware('auth');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
Route::namespace('Admin')->prefix('admin.super')->name('admin.super.')->middleware('can:super-admin')->group(function(){
    Route::resource('/', 'SuperAdminController', ['except' => ['show', 'create', 'store']]);
});
Route::resource('properties', 'PropertiesController');

/*
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

*/
