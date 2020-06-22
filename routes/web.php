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


Route::get('/resize', function(){ return view('resize'); });
Route::post('/change', 'resizeImage@resize')->name('change');
Route::middleware('auth')->prefix('/user')->group(function(){
    Route::post('/courseRegister', 'PageController@registerCourses')->name('courseReg');
    Route::post('/score', 'CheckAnswers@score')->name('mark');
    Route::get('/check_result', 'ResultsController@showform')->name('check.result');
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::post('/check_result', 'ResultsController@fetchResult')->name('result');
// Route::post('password/email', "Auth/ForgotPasswordControllre@sendResetLinkEmail");
// Route::post('password/reset', "Auth/ResetPasswordControllre@reset");
