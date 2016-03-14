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
        $monthly_visits = array();
        $count;
        foreach ($categories as $category) {
             $category_monthly_reported = [0,0,0,0,0,0,0,0,0,0,0,0];
             $article_visits = Article_View::where('cat_id',$category->cat_id);
             foreach ($article_visits as $article_visit) {
                $view = $article_visit->first();
                $visit_date = Carbon::parse($view->created_at);
                $month =$visit_date->month;
                if($visit_date->month < 10){
                    $month = "0". $visit_date->month;
                }
                $case_param = $visit_date->year."-".$month;
                switch ($case_param) {
                    case $visit_date->year."-01":
                        $category_monthly_reported[0] += 1;
                        break;
                    case $visit_date->year."-02":
                       $category_monthly_reported[1] += 1;
                        break;
                   case $visit_date->year."-03":
                        $category_monthly_reported[2] += 1;
                        break;
                    case $visit_date->year."-04":
                        $category_monthly_reported[3] += 1;
                        break;
                    case $visit_date->year."-05":
                        $category_monthly_reported[4] += 1;
                        break;
                    case $visit_date->year."-06":
                        $category_monthly_reported[5] += 1;
                        break;
                    case $visit_date->year."-07":
                        $category_monthly_reported[6] += 1;
                        break;
                    case $visit_date->year."-08":
                       $category_monthly_reported[7] += 1;
                        break;
                    case $visit_date->year."-09":
                        $category_monthly_reported[8] += 1;
                        break;
                    case $visit_date->year."-10":
                        $category_monthly_reported[9] += 1;
                        break;
                    case $visit_date->year."-11":
                        $category_monthly_reported[10] += 1;
                        break;
                    case $visit_date->year."-12":
                        $category_monthly_reported[11] += 1;
                        break;
                }
             }
             $monthly_visits[$category->category_name] = $category_monthly_reported;
        }
        
         return $monthly_visits;
    }
}
