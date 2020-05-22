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

    /*Admin side*/
    Route::group(['middleware' => ['status', 'auth']], function (){
        $groupData = [
            'namespace' => 'Blog\Admin',
            'prefix' => 'admin',
        ];

        Route::group($groupData, function (){
            Route::resource('index', 'MainController')
                ->names('blog.admin.index');

            Route::resource('requests', 'RequestController')
                ->names('blog.admin.requests');

            Route::get('/requests/change/{id}', 'RequestController@change')
                ->name('blog.admin.requests.change');

            Route::post('/requests/save/{id}', 'RequestController@save')
                ->name('blog.admin.requests.save');

            Route::get('/requests/force_destroy/{id}', 'RequestController@force_destroy')
                ->name('blog.admin.requests.force_destroy');

            Route::resource('users', 'UserController')
                ->names('blog.admin.users');

            Route::resource('statistics', 'StatisticController')
                ->names('blog.admin.statistics');

            Route::get('/statistics/force_destroy/{id}', 'StatisticController@force_destroy')
                ->name('blog.admin.statistics.force_destroy');
        });
    });

    /*User side*/
    Route::get('user/index', 'Blog\User\MainController@index');
