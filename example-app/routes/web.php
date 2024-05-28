<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/reserve-book/{id}', 'BookController@ReserveBook')->name('ReserveBook');
    Route::get('/my-books', 'BookController@ShowBooks')->name('ShowBooks');
    Route::get('/return-book/{id}', 'BookController@ReturnBook')->name('ReturnBook');
});

Route::group(['namespace' => 'App\Http\Controllers\auth'], function()
{
    /**
     * Home Routes
     */
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
