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

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resize', function(){ return view('resize'); });
Route::post('/change', 'resizeImage@resize')->name('change');
Route::middleware('auth')->prefix('/user')->group(function(){
    Route::post('/courseRegister', 'PageController@registerCourses')->name('courseReg');
    Route::post('/score', 'CheckAnswers@score')->name('mark');
    Route::get('/check_result', 'ResultsController@showform')->name('check.result');
});
Route::post('/check_result', 'ResultsController@fetchResult')->name('result');


// admin route
Route::prefix('/admin')->group(function(){
    Route::get('/', 'admin\LoginController@showLoginForm')->name('admin.form');
    Route::middleware('isadmin')->post('/login', 'admin\LoginController@login')->name('admin.login');
    Route::post('/logout', 'admin\LoginController@logout')->name('admin.logout');
    Route::get('/home', 'admin\AdminController@index')->name('admin.dashboard');
    Route::get('/profile/{user}-{name}', 'admin\AdminController@userProfile')->name('user.profile');
    Route::patch('/user/{user}-{name}', 'admin\AdminController@userProfileUpdate')->name('user.update');
    Route::patch('/course/{course}-{name}', 'admin\AdminController@courseUpdate')->name('course.update');
});
// Route::post('password/email', "Auth/ForgotPasswordControllre@sendResetLinkEmail");
// Route::post('password/reset', "Auth/ResetPasswordControllre@reset");
