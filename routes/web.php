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

//Route::get('/', function () {
    //return view('welcome');
    //return 'The Vinyl Shop';

//});

Route::view('/', 'home');

//Route::get('contact-us', function () {
    //return view('welcome');
    //return 'Contact info';
    //return view('contact');
//});

Route::view('contact-us', 'contact');


// New version with prefix and group
Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::get('records', 'Admin\RecordController@index');
});


