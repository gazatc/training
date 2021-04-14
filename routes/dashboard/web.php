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

        Route::resource('employers', 'EmployerController');
        Route::post('employers/verifyTrigger/{employer}', 'EmployerVerifyController@verifyTrigger')->name('employers.verifyTrigger');
        Route::get('employers/{employer}/verify', 'EmployerVerifyController@showVerifyForm')->name('employers.showVerifyForm');
        Route::post('employers/{employer}/verify', 'EmployerVerifyController@verifyAccount')->name('employers.verifyAccount');

        Route::resource('jobSeekers', 'JobSeekerController');
        Route::post('jobSeekers/verifyTrigger/{jobSeeker}', 'JobSeekerVerifyController@verifyTrigger')->name('jobSeekers.verifyTrigger');
        Route::get('jobSeekers/{jobSeeker}/verify', 'JobSeekerVerifyController@showVerifyForm')->name('jobSeekers.showVerifyForm');
        Route::post('jobSeekers/{jobSeeker}/verify', 'JobSeekerVerifyController@verifyAccount')->name('jobSeekers.verifyAccount');
        Route::get('jobSeekers/{jobSeeker}/cv', 'JobSeekerCVController@showCVForm')->name('jobSeekers.showCVForm');
        Route::post('jobSeekers/{jobSeeker}/cv', 'JobSeekerCVController@saveCV')->name('jobSeekers.saveCV');

        Route::resource('jobs', 'JobController');

        Route::resource('trainings', 'TrainingController');

        Route::resource('teams', 'TeamController')->except(['show']);

        Route::get('verifyAccounts/employers', 'VerifyAccountController@employersApplication')->name('verifyAccounts.employersApplication');
        Route::post('verifyAccounts/{employer}/employers', 'VerifyAccountController@verifyEmployer')->name('verifyAccounts.verifyEmployer');
        Route::delete('verifyAccounts/{employer}/deleteEmployerVerify', 'VerifyAccountController@deleteEmployerVerify')->name('verifyAccounts.deleteEmployerVerify');
        Route::get('verifyAccounts/jobSeekers', 'VerifyAccountController@jobSeekersApplication')->name('verifyAccounts.jobSeekersApplication');
        Route::post('verifyAccounts/{jobSeeker}/jobSeekers', 'VerifyAccountController@verifyJobSeeker')->name('verifyAccounts.verifyJobSeeker');
        Route::delete('verifyAccounts/{jobSeeker}/deleteJobSeekerVerify', 'VerifyAccountController@deleteJobSeekerVerify')->name('verifyAccounts.deleteJobSeekerVerify');

        Route::resource('jobApplications', 'JobApplicationController',
            ['parameters' => [
                'jobApplications' => 'application'
            ]])
            ->except(['show', 'edit', 'update']);
        Route::resource('trainingApplications', 'TrainingApplicationController',
            ['parameters' => [
                'trainingApplications' => 'application'
            ]])
            ->except(['show', 'edit', 'update']);

        Route::resource('jobInquires', 'JobInquireController',
            ['parameters' => [
                'jobInquires' => 'inquire'
            ]])
            ->only(['index', 'destroy']);
        Route::resource('trainingInquires', 'TrainingInquireController',
            ['parameters' => [
                'trainingInquires' => 'inquire'
            ]])
            ->only(['index', 'destroy']);
    });
});