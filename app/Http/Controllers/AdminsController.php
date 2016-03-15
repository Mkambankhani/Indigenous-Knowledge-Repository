<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Category;
use App\Visit;
use App\Article_View;
use Carbon\Carbon;
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
    function panel_data(){
        $counts = array();
        $counts['visitors'] = Visit::all()->count();
        $counts['users'] = User::all()->count();;
        $counts['authors'] =User::all()->count();;
        $counts['editors'] = User::all()->count();;
        return $counts;
    }
    function graph_data(){
        $categories = Category::all();
        $monthly_visits = [];
        for($i = 0 ; $i < $categories->count(); $i++){
            $monthly_visits[$i] ="";
        }
        $count = 0;
        $date_to_day = Carbon::now();
        foreach ($categories as $category) {
             $category_monthly_reported = [0,0,0,0,0,0,0,0,0,0,0,0];
             $article_visits = Article_View::where('cat_id',$category->cat_id);
             $category_monthly_reported[0] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-01%")->count();
             $category_monthly_reported[1] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-02%")->count();
             $category_monthly_reported[2] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-03%")->count();
             $category_monthly_reported[3] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-04%")->count();
             $category_monthly_reported[4] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-05%")->count();
             $category_monthly_reported[5] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-06%")->count();
             $category_monthly_reported[6] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-07%")->count();
             $category_monthly_reported[7] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-08%")->count();
             $category_monthly_reported[8] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-09%")->count();
             $category_monthly_reported[9] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-10%")->count();
             $category_monthly_reported[10] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-11%")->count();
             $category_monthly_reported[11] =  Article_View::where('cat_id',$category->cat_id)->where('created_at','LIKE',"%".$date_to_day->year."-12%")->count();
             $monthly_visits[$count] = array('name' =>$category->cat_name ,'data' =>$category_monthly_reported);
             $count++;
        }
        
         return $monthly_visits;
    }
}
