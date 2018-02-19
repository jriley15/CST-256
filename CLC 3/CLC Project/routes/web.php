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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

//Auth::routes();






Route::get('/home', 'HomeController@index')->name('home');

//routes for login and register form actions
Route::post('/doLogin','User\LoginController@attemptLogin');
Route::post('/doRegister','User\RegisterController@attemptRegister');
    
//routes for login and register views
Route::get('register', ['as' => 'register', 'uses' => 'User\RegisterController@index']);
Route::get('login', ['as' => 'login', 'uses' => 'User\LoginController@index']);

Route::get('logout', ['as' => 'logout', 'uses' => 'User\LoginController@logout']);

Route::get('/jobs', 'Jobs\JobController@index')->name('jobs');
Route::get('/viewJob', 'Jobs\JobController@viewJob')->name('viewJob');
Route::get('/newJob', 'Jobs\JobController@newJob')->name('newJob');
Route::post('/createJob', 'Jobs\JobController@createJob')->name('createJob');
Route::get('/editJob', 'Jobs\JobController@editJob')->name('editJob');
Route::get('/deleteJob', 'Jobs\JobController@deleteJob')->name('deleteJob');
Route::post('/updateJob', 'Jobs\JobController@updateJob')->name('updateJob');



Route::get('/admin', 'User\AdminController@index')->name('admin');
Route::post('/adminSearch','User\AdminController@searchUsers');
Route::post('/adminEdit','User\AdminController@editUser');
Route::post('/adminSave','User\AdminController@updateUser');
Route::post('/adminDelete','User\AdminController@deleteUser');

Route::get('/myProfile','User\ProfileController@view')->name('myProfile');
Route::get('/editProfile','User\ProfileController@edit')->name('editProfile');
Route::post('/updateProfile','User\ProfileController@updateProfile')->name('updateProfile');


Route::get('/loginPassed2', function() {
    
    return view('user.login.loginPassed');
});

Route::get('/login2', function() {
    
    return view('user.login.login2');
});










