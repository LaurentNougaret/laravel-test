<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::routes();
//    Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
//    });
    /* Admin Dashboard */
//    Route::group(['middleware' => 'IsAdmin'], function (){
    Route::prefix('admin')->group(function () {
    Route::get('/', 'Back\AdminController@index');
    Route::resource('users', 'Back\UserController');
    Route::resource('project', 'Back\ProjectController');
    Route::resource('stats', 'Back\StatsController');
    Route::delete('users', ['as'=>'users.destroy', 'uses'=>'Back\UserController@destroy']);

//    });
    });

    /* Users routes */
//    Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', 'Front\UserController@profile');
    Route::resource('project.form', 'Front\FormController', ['except' => [
        'destroy', 'create', 'store']]);
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
