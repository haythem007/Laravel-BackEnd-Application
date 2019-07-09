<?php
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function(){

            
        
        
            Route::get('/index', 'DashboardController@index')->name('index');
            Route::get('/', 'WelcomeController@index')->name('welcome');
            Route::resource('users','UserController');
            Route::resource('categories','CategoryController');
            Route::resource('products','ProductController');
            Route::resource('clients','ClientController');
            Route::resource('clients.orders','Client\OrderController');




        });

    });
