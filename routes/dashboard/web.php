<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {
    Config::set('auth.defines', 'admin');

    Route::get('login', 'AuthController@showLoginForm')->name('dashboard.login');
    Route::post('login', 'AuthController@login');
    Route::any('logout', 'AuthController@logout')->name('dashboard.logout');

    Route::group(['middleware' => ['adminAuth:admin'], 'as' => 'dashboard.'], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('admins', 'AdminController')->except(['show']);

        Route::resource('roles', 'RoleController')->except(['show']);

        Route::resource('categories', 'CategoryController')->except(['show']);

        Route::resource('regions', 'RegionController')->except(['show']);

        Route::resource('employers', 'EmployerController')->except(['show']);
        Route::post('employers/verifyTrigger/{employer}', 'EmployerVerifyController@verifyTrigger')->name('employers.verifyTrigger');
        Route::get('employers/{employer}/verify', 'EmployerVerifyController@showVerifyForm')->name('employers.showVerifyForm');
        Route::post('employers/{employer}/verify', 'EmployerVerifyController@verifyAccount')->name('employers.verifyAccount');

    });
});