<?php

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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('mail')->group(function () {
    Route::get('verify/{token}', ['as' => 'email.verify', 'uses' => 'EmailController@verify']);
    Route::get('has-been-send', 'EmailController@hasBeenSend');
});

Route::get('/mail', function () {
    $user = \App\Model\User::first();
    return new \App\Mail\RegisterToken($user);
});