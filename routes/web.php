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

Route::get('/',                     'PagesController@index'     )->name('index');
Route::get('/blog',                 'PagesController@blog'      )->name('blog');
Route::get('/contact',              'PagesController@contact'   )->name('contact');
Route::get('/about',                'PagesController@about'     )->name('about');
Route::get('/listings',             'PagesController@listings'  )->name('listings');
Route::get('/single',               'PagesController@single'    )->name('single');
Route::get('/property/{property}',  'PagesController@property'  )->name('property');
Route::get('/categories',           'PagesController@categories')->name('categories');
Route::get('/category/{category}',  'PagesController@category'  )->name('category');

Auth::routes();

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'home',
    'as' => 'home.',
],
    function () {
        Route::resource('/', 'HomeController' );
    });

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'properties',
    'as' => 'properties.',

],
    function () {
        Route::resource('/', 'PropertiesController');
    });


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
Route::namespace('Admin')->prefix('admin.super')->name('admin.super.')->middleware('can:super-admin')->group(function(){
    Route::resource('/', 'SuperAdminController', ['except' => ['show', 'create', 'store']]);
});

//Route::resource('properties', 'PropertiesController');
/*
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
*/

//Route::get('/home',     'HomeController@index'      )->name('home')->middleware('auth');

