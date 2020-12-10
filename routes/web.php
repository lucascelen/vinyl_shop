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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');
// Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('home', '/');

Route::view('/', 'home');
Route::get('shop', 'ShopController@index');
Route::get('shop/{id}', 'ShopController@show');
Route::get('shop_alt', 'ShopController@shop_alt');

//Route::get('contact-us', function () {
    //return view('welcome');
    //return 'Contact info';
    //return view('contact');
//});

Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');


// New version with prefix and group
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::resource('genres', 'Admin\GenreController');
    Route::get('genres2/qryGenres', 'Admin\Genre2Controller@qryGenres');
    Route::resource('genres2', 'Admin\Genre2Controller', ['parameters' => ['genres2' => 'genre']]);
    Route::resource('records', 'Admin\RecordController');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');
});



