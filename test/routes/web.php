<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\login;

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
Route::get('/welcome','App\Http\Controllers\login@show_welcome');
Route::get('/login','App\Http\Controllers\login@show_login');
Route::post('/check_login','App\Http\Controllers\login@dangnhap');
Route::get('/logout','App\Http\Controllers\login@logout');
//Route::get('/check_login','App\Http\Controllers\login@check_login');
Route::get('user/list','App\Http\Controllers\UserController@all_user');
Route::post('user/remove','App\Http\Controllers\UserController@remove_user');
Route::get('user/new','App\Http\Controllers\UserController@add_user');
Route::post('user/save','App\Http\Controllers\UserController@save_user');
Route::post('user/update','App\Http\Controllers\UserController@update_user');
Route::get('user/edit','App\Http\Controllers\UserController@show_update_modal');
Route::get('user/remove','App\Http\Controllers\UserController@show_remove_modal');
Route::get('user/edit/{id}','App\Http\Controllers\UserController@show_update');
Route::get('user/bootstrap','App\Http\Controllers\UserController@show_boootstap');
Route::get('user/change','App\Http\Controllers\UserController@show_change');
Route::post('user/change','App\Http\Controllers\UserController@save_change');
Route::get('user/unactive','App\Http\Controllers\UserController@unactive');
Route::get('user/active','App\Http\Controllers\UserController@active');
Route::get('user/export','App\Http\Controllers\UserController@exportcsv');