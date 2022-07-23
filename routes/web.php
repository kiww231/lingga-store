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
    Route::resource('/feature','Admin\FeatureController');
    Route::get('/feature/status/{id}/{status}','Admin\FeatureController@change_status');
    Route::resource('/article','Admin\ArticleController');
    Route::get('/article/status/{id}/{status}','Admin\ArticleController@change_status');
});

Route::get('/artisan/{config}', function($config) {
    $exitCode = Artisan::call($config);
    return 'Berhasil';
}); 

Route::get('/{slug}',['as' => 'article', 'uses' => 'ArticleController@detail'])->where('slug', '[A-Za-z0-9-_]+');