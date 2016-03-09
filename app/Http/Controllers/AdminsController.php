<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Category;

class AdminsController extends Controller
{
    //
    function index(){
    	return view("admin.index");
    }
    function categories(){
    	$categories = Category::all();
    	return view("admin.categories",compact("categories"));
    }
    function articles(){
    	$articles = Article::all();
    	return view("admin.articles",compact("articles"));
    }
     function users(){
    	$users = Article::all();
    	return view("admin.users",compact("users"));
    }
    function piechart(){
        $categories = Category::all();
        $counts = array();
        $i = 0;
        foreach ($categories as $category) {
            $minarry = array();
            $minarry['category'] = $category->cat_name;
            $minarry['count'] = Article::where('cat_id',$category->cat_id)->count();
            $counts[$i] = $minarry;
            $i++;
        }
        return $counts;
    }
}
