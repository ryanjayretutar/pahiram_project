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

//Route::get('/', function () {
//   return view('welcome');
//});

Auth::routes();


//FOR FRONT PAGE ROUTE
Route::get('/', function () {
   return view('welcome');
});


Route::get('/home', function () {
    return view('contents/home');
});

Route::get('/items', function () {
    return view('contents/all-items');
});

Route::get('/newsfeed', function () {
    return view('contents/newsfeed');
});

Route::get('/profile', function () {
    return view('contents/profile');
});

Route::get('/reviews', function () {
    return view('contents.reviews');
});


//Route::get('/home', 'HomeController@index')->name('home');

