<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controller\UserController;
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
Auth::routes(['verify' => true]);
// Route::get('/kirim-email', 'EmailController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
// Route::get('user/{user}', 'UserController@show');
// Route::post('user/create', 'UserController@create');
// Route::post('user/store', 'UserController@store');

Route::get('auth/google', 'Auth\googleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

// Route::get('/{any}', function () {
//     return view('layouts.vue');
// })->where('any', '.*');
