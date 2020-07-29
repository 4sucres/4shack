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

Route::get('/', 'WelcomeController');

/**
 * Catch-all routes
 */

Route::get('/{hashid}', 'ImageController@show');

/**
 * Bridge NoelShack (liens directs)
 * Type 1 : image.noelshack.com/fichiers/2016/38/1474567453-1472310080-picsart-08-27-12-36-12.png
 * Type 2 : image.noelshack.com/fichiers/2019/37/1/1567994655-photoeditor-20190909-040348985.jpg
 */

Route::get('/fichiers/{a}/{b}/{c}', 'ImageController@fromNoelshack');
Route::get('/fichiers/{a}/{b}/{c}/{d}', 'ImageController@fromNoelshack');
Route::get('/{a}/{b}/{c}', 'ImageController@fromNoelshack');
Route::get('/{a}/{b}/{c}/{d}', 'ImageController@fromNoelshack');
