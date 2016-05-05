<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;
use App\Article_View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$article_count= Article::all()->count();
        $recent = Article::orderBy('created_at','desc')->get();
        $most_visit = Article_View::select(DB::raw('articles.title,article__views.article_id, count(*) as `aggregate`'))->join('articles', 'article__views.article_id', '=', 'articles.article_id')->groupBy('article_id')->orderBy('aggregate', 'desc')->limit(5)->get();
        return view('welcome',compact('recent','most_visit'));
        //return view('home');
    }
}
