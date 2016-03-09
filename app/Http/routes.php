<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::get("categories","CategoriesController@index");
 Route::get("categories/create","CategoriesController@create");
 Route::post("categories/new","CategoriesController@newcategory");
 Route::get("categories/{id}/edit","CategoriesController@edit");
 Route::post("categories/{id}/update","CategoriesController@update");

 Route::get("articles","ArticlesController@index");
 Route::get("articles/create","ArticlesController@create");
 Route::post("articles/store","ArticlesController@store");
 Route::get("articles/{id}","ArticlesController@show");
 Route::get("articles/{id}/edit","ArticlesController@edit");
 Route::post("articles/{id}/update","ArticlesController@update");

 Route::get("tasks","TasksController@index");
 Route::get("tasks/assign","TasksController@assign");

 Route::get("admin","AdminsController@index");
 Route::get("admin/categories","AdminsController@categories");
 Route::get("admin/articles","AdminsController@articles");
 Route::get("admin/users","AdminsController@users");

 /*Routes for Dashboard Data*/
 Route::get("admin/piechart","AdminsController@piechart");
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

});


