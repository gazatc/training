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
    Route::group(['prefix' => 'jobs'], function () {

        Route::get('/create', 'FrontController\JobController@create')->name('jobs.create');
        Route::post('/store/{employer}', 'FrontController\JobController@store')->name('job.store');
        Route::get('/edit/{job}', 'FrontController\JobController@edit')->name('job.edit');
        Route::get('/update/{job}', 'FrontController\JobController@update')->name('job.update');
        Route::get('/destroy/{job}', 'FrontController\JobController@destroy')->name('job.destroy');
    });
    Route::group(['prefix' => 'training'], function () {
        Route::get('/create', 'FrontController\TrainingController@create')->name('training.create');
        Route::post('/store/{employer}', 'FrontController\TrainingController@store')->name('training.store');
        Route::get('/edit/{training}', 'FrontController\TrainingController@edit')->name('training.edit');
        Route::get('/update/{training}', 'FrontController\TrainingController@update')->name('training.update');
        Route::get('/destroy/{training}', 'FrontController\TrainingController@destroy')->name('training.destroy');

    });
});


Route::get('/', 'FrontController\HomeController@jobs')->name('jobs');
Route::get('/employers', 'FrontController\HomeController@employers')->name('employers');
Route::get('/trainings', 'FrontController\HomeController@trains')->name('trains');
Route::get('/freelancers', 'FrontController\HomeController@freelancers')->name('freelancers');


Route::get('/job-seeker/{jobSeeker}', 'FrontController\JobSeekerController@show')->name('jobseeker.show');
Route::get('/employer/{employer}', 'FrontController\EmployerController@show')->name('employer.show');
Route::get('/job/{job}', 'FrontController\JobController@show')->name('job.show');
Route::get('/training/{training}', 'FrontController\TrainingController@show')->name('training.show');



//attempt to train
Route::post('/training/{training}','FrontController\TrainingApplicationController@store')->name('training.apply');
Route::post('/job/{job}/apply','FrontController\JobApplicationController@store')->name('job.apply');



//Route::get('/job-single', function () {
//    return view('front.single-job');
//});
//

