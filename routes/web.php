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
Route::get('/resize', function(){ return view('resize'); });
Route::post('/change', 'resizeImage@resize')->name('change');
Route::post('/courseRegister', 'PageController@registerCourses')->name('courseReg');
Route::post('/check', 'CheckAnswers@score')->name('mark');
// Route::post('password/email', "Auth/ForgotPasswordControllre@sendResetLinkEmail");
// Route::post('password/reset', "Auth/ResetPasswordControllre@reset");
