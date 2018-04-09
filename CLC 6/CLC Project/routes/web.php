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

//home route
Route::get('/home', 'HomeController@index')->name('home');

//routes for login and register form actions
Route::post('/doLogin','User\LoginController@attemptLogin');
Route::post('/doRegister','User\RegisterController@attemptRegister');
    
//routes for login and register views
Route::get('register', ['as' => 'register', 'uses' => 'User\RegisterController@index']);
Route::get('login', ['as' => 'login', 'uses' => 'User\LoginController@index']);
Route::get('logout', ['as' => 'logout', 'uses' => 'User\LoginController@logout']);

//group management routes
Route::get('/groups', 'Groups\GroupController@index')->name('groups');
Route::get('/viewGroup', 'Groups\GroupController@viewGroup')->name('viewGroup');
Route::get('/newGroup', 'Groups\GroupController@newGroup')->name('newGroup');
Route::post('/createGroup', 'Groups\GroupController@createGroup')->name('createGroup');
Route::post('/editGroup', 'Groups\GroupController@editGroup')->name('editGroup');
Route::post('/deleteGroup', 'Groups\GroupController@deleteGroup')->name('deleteGroup');
Route::post('/updateGroup', 'Groups\GroupController@updateGroup')->name('updateGroup');
Route::post('/joinGroup', 'Groups\GroupController@joinGroup')->name('joinGroup');
Route::post('/leaveGroup', 'Groups\GroupController@leaveGroup')->name('leaveGroup');
Route::post('/removeFromGroup', 'Groups\GroupController@removeFromGroup')->name('removeFromGroup');

//job management routes
Route::get('/jobs', 'Jobs\JobController@index')->name('jobs');
Route::get('/viewJob', 'Jobs\JobController@viewJob')->name('viewJob');
Route::get('/newJob', 'Jobs\JobController@newJob')->name('newJob');
Route::post('/createJob', 'Jobs\JobController@createJob')->name('createJob');
Route::post('/editJob', 'Jobs\JobController@editJob')->name('editJob');
Route::post('/deleteJob', 'Jobs\JobController@deleteJob')->name('deleteJob');
Route::post('/updateJob', 'Jobs\JobController@updateJob')->name('updateJob');

//job search routes
Route::get('/jobSearch', 'Jobs\JobController@search')->name('jobSearch');
Route::post('/doJobSearch', 'Jobs\JobController@doSearch')->name('doJobSearch');


//admin management routes
Route::get('/admin', 'User\AdminController@index')->name('admin');
Route::post('/adminSearch','User\AdminController@searchUsers');
Route::post('/adminEdit','User\AdminController@editUser');
Route::post('/adminSave','User\AdminController@updateUser');
Route::post('/adminDelete','User\AdminController@deleteUser');

//profile routes
Route::get('/myProfile','User\ProfileController@view')->name('myProfile');
Route::get('/editProfile','User\ProfileController@edit')->name('editProfile');
Route::post('/updateProfile','User\ProfileController@updateProfile')->name('updateProfile');
Route::get('/viewProfile','User\ProfileController@viewProfile')->name('viewProfile');

//rest resource routes
Route::resource('/restProfile','Rest\RestProfileController');
Route::resource('/restJob','Rest\RestJobController');






