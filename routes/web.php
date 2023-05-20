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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['namespace' => 'Fanfiction'], function () {
    Route::get('/work', 'IndexController')->name('fan.index');
    Route::get('/work/create', 'CreateController')->name('fan.create');
    Route::post('/work', 'StoreController')->name('fan.store');
    Route::get('/work/{fanfiction}', 'ShowController')->name('fan.show');
    Route::get('/work/{fanfiction}/edit', 'EditController')->name('fan.edit');
    Route::patch('/work/{fanfiction}', 'UpdateController')->name('fan.update');
    Route::delete('/work/{fanfiction}', 'DestroyController')->name('fan.destroy');


    Route::group(['namespace' => 'Chapters', 'prefix' => '{fanfiction}'], function () {
        Route::get('/reader/create', 'CreateController')->name('chapters.create');
        Route::post('/reader', 'StoreController')->name('chapters.store');

    });
    Route::group(['namespace' => 'Like', 'prefix' => '{fanfiction}/likes'], function () {
        Route::post('/', 'StoreController')->name('fanfiction.like.store');

    });
    Route::group(['namespace' => 'comments', 'prefix' => '{fanfiction}/comments'], function (){
        Route::post('/', 'StoreController')->name('fanfiction.comment.store');
    });
});


Route::group(['namespace' => 'Office'], function () {
    Route::get('/office', 'IndexController')->name('office');

});



Route::group(['namespace' => 'Chapters'], function () {
    Route::get('/reader/{work}', 'ShowController')->name('chapters.show');
    Route::get('/reader/{chapters}/edit', 'EditController')->name('chapters.edit');
    Route::patch('/reader/{chapter}', 'UpdateController')->name('chapters.update');
    Route::delete('/reader/{work}', 'DestroyController')->name('chapters.destroy');

});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::group(['namespace' => 'Main'], function (){
        Route::get('/', 'IndexController')->name('admin');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

