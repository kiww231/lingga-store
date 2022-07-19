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

Route::get('/','HomeController@index');

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/','Admin\HomeController@index');
    Route::resource('/mempelai','Admin\MempelaiController');
    Route::get('/mempelai/status/{id}/{status}', 'Admin\MempelaiController@status');
    Route::resource('/image_background','Admin\ImageBackgroundController');
    Route::resource('/ucapan','Admin\UcapanController');
    Route::resource('/gallery','Admin\GalleryController');

    
});

Route::get('/artisan/{config}', function($config) {
    $exitCode = Artisan::call($config);
    return 'Berhasil';
}); 