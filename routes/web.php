<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('event');
// });

Route::get('/', function () {
    Cache::put('key', 'value', 15);
    if (Cache::get('key')) echo Cache::get('key');
    else echo 0;
    if (Cache::has('key')) {
        echo Cache::get('key');
    } else {
        Cache::put('key', 'values', 20);
    }
    return Cache::get('key');
});

$fileContents = 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fplay-lh.googleusercontent.com%2FM0srkoCNqpU1LsVI55ik8Q11JP-CeQgZq5IzT0yXmM_cyc-AhxdcOGkvpgH8hsLfe-Q&imgrefurl=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.pinger.textfree%26hl%3Dvi%26gl%3DUS&tbnid=BoZ6iRsScz8VIM&vet=12ahUKEwiD6sjfhpn6AhUHHKYKHec_Ax4QMygDegUIARDhAQ..i&docid=CM6jgVFm2lohcM&w=512&h=512&q=text&ved=2ahUKEwiD6sjfhpn6AhUHHKYKHec_Ax4QMygDegUIARDhAQ';

Storage::put('avatars/1', $fileContents);
// Route::resource('post', 'PostController');

Route::get('token', 'PostController@getToken');

Route::get('post', 'PostController@index');

Route::get('post/{id}', 'PostController@getById');

Route::post('post', 'PostController@store');

Route::match(['put', 'patch'], 'post/{id}', 'PostController@update');

Route::delete('post/{id}', 'PostController@destroy');
