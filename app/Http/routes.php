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

/***Tempory Code**/
use App\Article;
use App\Article_View;
Route::get('/', function () {
    $recent = Article::orderBy('created_at','desc')->limit(5)->get();
    $most_visit = Article_View::select(DB::raw('articles.title,article__views.article_id, count(*) as `aggregate`'))->join('articles', 'article__views.article_id', '=', 'articles.article_id')->groupBy('article_id')->orderBy('aggregate', 'desc')->limit(5)->get();
    return view('welcome',compact('recent','most_visit'));
});
/**end of Temporary Code*/
 Route::get("categories","CategoriesController@index");
 Route::get("categories/create","CategoriesController@create");
 Route::post("categories/new","CategoriesController@newcategory");
 Route::get("categories/{id}/edit","CategoriesController@edit");
 Route::post("categories/{id}/update","CategoriesController@update");

 Route::get("articles","ArticlesController@index");
 Route::get("articles/create","ArticlesController@create");
 Route::post("articles/store","ArticlesController@store");
 Route::get("/articles/recent","ArticlesController@recent");
 Route::get("/articles/most_view","ArticlesController@most_view");
 Route::get("articles/{id}","ArticlesController@show");
 Route::get("articles/{id}/edit","ArticlesController@edit");
 Route::post("articles/{id}/update","ArticlesController@update");


 Route::get("tasks","TasksController@index");
 Route::get("tasks/assign","TasksController@assign");

 Route::get("adminpanel","AdminsController@index");
 Route::get("admin/categories","AdminsController@categories");
 Route::get("admin/articles","AdminsController@articles");
 Route::get("admin/users","AdminsController@users");

 /*Routes for Dashboard Data*/
 Route::get("admin/piechart","AdminsController@piechart");
  Route::get("admin/panel_data","AdminsController@panel_data");
  Route::get("admin/graph_data","AdminsController@graph_data");
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


