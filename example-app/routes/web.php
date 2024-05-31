<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/reserve-book/{id}', 'BookController@ReserveBook')->name('ReserveBook');
    Route::get('/my-books', 'BookController@ShowBooks')->name('ShowBooks');
    Route::get('/return-book/{id}', 'BookController@ReturnBook')->name('ReturnBook');
    Route::get('/search-book-for-name', 'BookController@SearchBookForName')->name('SearchBookForName');
    Route::get('/search-book-for-id', 'BookController@SearchBookForId')->name('SearchBookForId');
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

    Route::group(['middleware' => 'admin.panel'], function () {
        // Admin routes here
        Route::get('/admin-panel', 'AdminPanelController@showAdminPanel')->name('admin.dashboard');
        Route::get('/admin-panel-edit-book/{id}', 'AdminPanelController@CheckBookAdmin')->name('admin.checkBook');
        Route::get('/edit-to-base-book/{id}', 'AdminPanelController@EditBookAdmin')->name('admin.editBook');
        Route::get('/admin-panel-delete-book/{id}', 'AdminPanelController@DeleteBookAdmin')->name('admin.deleteBook');
        Route::get('/admin-panel-add-books', 'AdminPanelController@AddBookAdmin')->name('admin.addBook');
        Route::get('/admin-panel-add-to-base-book', 'AdminPanelController@AddToBaseBookAdmin')->name('admin.addToBaseBook');
    });
});
