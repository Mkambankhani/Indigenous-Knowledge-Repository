<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Category;

class CategoriesController extends Controller
{
    //
    function index(){
    	$categories = Category::all();
    	return view("categories.index", compact('categories'));
    }
    function show($id){
        return $id;
    }
    function create(){
    	return view("categories.create");
    }
    function newcategory(CreateCategoryRequest $request){
    	$category = new Category;
    	$category->cat_name = $_POST["category_name"];
    	$category->cat_description = $_POST["category_description"];
 		$category->cat_visibility = 0;
 		$category->save();
    	return redirect("/admin/categories");
    }
    function edit($id){
        $category = Category::where('cat_id', '=', $id)->firstOrFail();
        return view("categories.edit",compact("category"));
    }
    function update($id){
         $category = Category::where('cat_id', '=', $id)->update(['cat_name'=>$_POST['cat_name'],'cat_description'=>$_POST['cat_description']]);
         return redirect('/admin/categories');
    }
    function visible($id){
        $category = Category::where('cat_id', '=', $id);
        if($category->update(['cat_visibility'=>true])){
            return redirect("/admin/categories");
        }
        else{
            return "Fail";
        }
    }
    function delete($id){
        $category = Category::where('cat_id', '=', $id);
        if($category->delete()){
            return redirect("/admin/categories");
        }
        else{
            return "Fail";
        }
    }
    function find(){
        $category = Category::where('cat_id', '=', $_GET['id'])->firstOrFail();
        return $category;
    }
}
