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
Route::get('/authtest', function () {

    dd(auth()->guard('jobSeeker')->check());
});

Route::group(['prefix' => 'jobSeeker'], function () {
    Route::get('/login', 'Auth\JobSeekerLoginController@login_form')->name('job-sekeer.login_form');
    Route::post('/submit-login', 'Auth\JobSeekerLoginController@login')->name('job-sekeer.login');
    Route::get('/register', 'Auth\JobSeekerLoginController@register_form')->name('job-sekeer.register_form');
    Route::post('/submit_register', 'Auth\JobSeekerLoginController@register_post')->name('job-sekeer.register');

    Route::get('logout', 'Auth\JobSeekerLoginController@logout_jobSeeker')->name('job-sekeer.logout');
});

Route::group(['prefix' => 'employer'], function () {

    Route::get('/login', 'Auth\EmployerLoginController@login_form')->name('employer.login_form');
    Route::post('/submit-login', 'Auth\EmployerLoginController@login')->name('employer.login');
    Route::get('/register', 'Auth\EmployerLoginController@register_form')->name('employer.register_form');
    Route::post('/submit_register', 'Auth\EmployerLoginController@register_post')->name('employer.register');
    Route::get('/logout', 'Auth\EmployerLoginController@logout_employer')->name('employer.logout');


//employer stuff
    Route::group(['prefix' => 'jobs','namespace' => 'FrontController'], function () {

        Route::get('/', 'JobController@index')->name('job.index');
        Route::get('/create', 'JobController@create')->name('job.create');
        Route::post('/store/{employer}', 'JobController@store')->name('job.store');
        Route::get('/edit/{job}', 'JobController@edit')->name('job.edit');
        Route::post('/update/{job}', 'JobController@update')->name('job.update');
        Route::get('/destroy/{job}', 'JobController@destroy')->name('job.destroy');
    });
    Route::group(['prefix' => 'training','namespace' => 'FrontController'], function () {
        Route::get('/', 'TrainingController@index')->name('training.index');
        Route::get('/create', 'TrainingController@create')->name('training.create');
        Route::post('/store/{employer}', 'TrainingController@store')->name('training.store');
        Route::get('/edit/{training}', 'TrainingController@edit')->name('training.edit');
        Route::post('/update/{training}', 'TrainingController@update')->name('training.update');
        Route::get('/destroy/{training}', 'TrainingController@destroy')->name('training.destroy');

    });
});

Route::group(['namespace' => 'FrontController'], function () {

    Route::get('/', 'HomeController@jobs')->name('jobs');
    Route::get('/employers', 'HomeController@employers')->name('employers');
    Route::get('/trainings', 'HomeController@trains')->name('trains');
    Route::get('/jobSeekers', 'HomeController@jobSeekers')->name('jobSeekers');


    Route::get('/job-seeker/{jobSeeker}', 'JobSeekerController@show')->name('jobseeker.show');
    Route::get('/employer/{employer}', 'EmployerController@show')->name('employer.show');
    Route::get('/job/{job}', 'JobController@show')->name('job.show');
    Route::get('/training/{training}', 'TrainingController@show')->name('training.show');


//attempt to train
    Route::post('/training/{training}', 'TrainingApplicationController@store')->name('training.apply');
    Route::post('/job/{job}/apply', 'JobApplicationController@store')->name('job.apply');

});


