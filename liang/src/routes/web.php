<?php

use Illuminate\Support\Facades\Route;

 Route::middleware(['web'])
    ->prefix('blog')
    ->name('blog.')
    ->namespace('Liang\Http\Controllers')
    ->group(function(){
        Route::get('login', 'LoginController@loginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login.post');

        Route::get('logout', 'LoginController@logout')->name('logout');

        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email.post');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset.token');


        Route::get('','BlogController@index')->name('index');

        Route::get('article/delete/{id}/{tag}/{type?}','ArticleController@destroy')->name('delete');
        Route::resource('article','ArticleController');
        Route::any('search','SearchController@article')->name('search');

        Route::post('article/cs','CommentController@saveComment')->name('save.comment');

    });

    Route::middleware(['web'])
        ->prefix('manage')
        ->namespace('Liang\Http\Controllers')
        ->name('manage.')
        ->group(function(){
            Route::get('login','ManageController@login')->name('login');
            Route::get('/','ManageController@index')->name('index');
            Route::get('/main','ManageController@main')->name('main');
            Route::get('article','ManageController@sou')->name('article');
            Route::get('article/create','ManageController@createArticle')->name('article.create');
            Route::get('article/update/{id}','ManageController@updateArticle')->name('article.update');

            Route::post('searchBookmark','ManageController@searchBookmark')->name('bookmark.search');
            Route::get('bookmark/{type}','ManageController@bookmark')->name('bookmark');
            Route::any('addBookmark','ManageController@addBookmark')->name('bookmark.add');
            Route::get('bookmark/delete/{id}','ManageController@deleteBookmark')->name('bookmark.delete');

            Route::any('menu','ManageController@updateMenu')->name('menu');
            Route::post('addMenu','ManageController@addMenu')->name('addMenu');
            Route::get('delete/menu/{id}','ManageController@deleteMenu')->name('menu.delete');
            Route::post('update','ManageController@updateMenu')->name('menu.update');

            Route::any('upload/image','MyBodyController@uploadImage')->name('upload.image');

            Route::post('store/checkDate','MyBodyController@check_store')->name('check.store');

            Route::get('blood','MyBodyController@blood')->name('blood');
            Route::get('piss','MyBodyController@piss')->name('piss');
            Route::get('liverKidney','MyBodyController@liverKidney')->name('liverKidney');
            Route::get('biochemistry','MyBodyController@biochemistry')->name('biochemistry');
            Route::get('get/data/{table}/{column}/{type?}','MyBodyController@getChartData')->name('chart_data');
            Route::get('get/data/{table}/{column}/{max}/{min}','MyBodyController@getPieChartData');


            Route::any('uploads','MyBodyController@test')->name('test');
        });
