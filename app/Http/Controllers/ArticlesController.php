<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Category;
class ArticlesController extends Controller
{
    function index(){
    	$articles = Article::all();
    	return view("articles.index", compact("articles"));
    }
    function create(){
    	$users = User::all();
    	$categories = Category::all();
    	return view("articles.create",compact('users','categories'));
    }
    function newarticle(){
    	$article = new Article();
    	$article->title = $_POST["title"];
    	$article->body = $_POST["body"];
    	$article->cat_id = $_POST["category"];
    	$article->image_url= $_POST["image"];
    	$article->video_url= $_POST["video"];
    	//$article->documen_url= $_POST["document"];
    	$article->author_id = 1;
    	$article->editor_id= $_POST["editor"];
    	$article->save();
    	return redirect("articles");
    }
    function show($id){
    	$article = Article::where('article_id', '=', $id)->firstOrFail();
    	return view("articles.show", compact("article"));
    }
}
