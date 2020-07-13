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

Route::get('/',                     'MenuPagesController@index'     )->name('index');
Route::get('/blog',                 'MenuPagesController@blog'      )->name('blog');
Route::get('/contact',              'MenuPagesController@contact'   )->name('contact');
Route::get('/about',                'MenuPagesController@about'     )->name('about');
Route::get('/listings',             'MenuPagesController@ajax_listings'  )->name('listings');
Route::get('/single',               'MenuPagesController@single'    )->name('single');
Route::get('/property/{property}',  'MenuPagesController@property'  )->name('property');
Route::get('/categories',           'MenuPagesController@categories')->name('categories');
Route::get('/category/{category}',  'MenuPagesController@category'  )->name('category');

Route::get('/layouts/ajax_listings', 'MenuPagesController@ajax_listings')->name('ajax_listings');
Route::get('/ajax_filter_input_property_type', 'MenuPagesController@ajaxFilterInputPropertyType')->name('ajax_filter_input_property_type');
Route::get('/ajax_filter_input_rooms', 'MenuPagesController@ajaxFilterInputRooms')->name('ajax_filter_input_rooms');
Route::get('/ajax_filter_input_location', 'MenuPagesController@ajaxFilterInputLocation')->name('ajax_filter_input_location');

Auth::routes();
Route::get('properties/img-dropzone-fetch/{id}','PropertiesController@imgDropzoneFetch')->name('home.properties.img-dropzone-fetch');
Route::get('properties/{id?}/img-dropzone-delete','PropertiesController@imgDropzoneDelete')->name('home.properties.{id?}.img-dropzone-delete');
Route::post('properties/{id}/img-dropzone-upload/','PropertiesController@imgDropzoneUpload')->name('home.properties.{id}.img-dropzone-upload');
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'home',
    'as' => 'home.',
],
    function () {

        Route::resource('/', 'HomeController' );
        Route::resource('/properties', 'PropertiesController', ['names' => [
            'img-dropzone-fetch' => 'home.properties.img-dropzone-fetch',
            'img-dropzone-delete' => 'home.properties.{id?}.img-dropzone-delete',
            'img-dropzone-upload' => 'home.properties.{id}.img-dropzone-upload',
            ]]);

    });

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
Route::namespace('Admin')->prefix('admin.super')->name('admin.super.')->middleware('can:super-admin')->group(function(){
    Route::resource('/pages', 'PageController');
    Route::resource('/', 'SuperAdminController', ['except' => ['show', 'create', 'store']]);

});

//Route::resource('properties', 'PropertiesController');
/*
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'properties',
    'as' => 'properties.',

],
    function () {

        Route::resource('/', 'PropertiesController');

    });
*/
/*
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
*/

//Route::get('/home',     'HomeController@index'      )->name('home')->middleware('auth');



