<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Article;
use App\User;
use App\Category;
use App\Task;
use App\Article_Editor ;
Use Storage;
use App\Article_View;
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
    function store(CreateArticleRequest $request){
    	$article = new Article();
    	$article->title = $_POST["title"];
    	$article->body = $_POST["body"];
    	$article->cat_id = $_POST["category"];
    	$article->image_url= $this->uploadFile($request,'image','images',$_POST["title"]);
    	$article->video_url= $this->uploadFile($request,'video','videos',$_POST["title"]);
    	$article->document_url= $this->uploadFile($request,'doc','docs',$_POST["title"]);
    	$article->user_id = 1;
    	$article->editor_id= $_POST["editor"];
    	$article->save();
        $task = new Task();
        $task->user_id = $_POST["editor"];
        $article_id = Article::where('title','=',$_POST["title"])->where('cat_id',$_POST["category"])->firstOrFail()->article_id;
        $task->article_id = $article_id;
        $task->save();
        $article_editor = new Article_Editor();
        $article_editor->article_id = $article_id;
        $article_editor->user_id = $_POST["editor"];
        $article_editor->save();
    	return redirect("/admin/articles");
    }
    function show($id){
    	$article = Article::where('article_id', '=', $id)->firstOrFail();
        $article_view = new Article_View();
        $article_view->article_id = $article->article_id;
        $article_view->cat_id = $article->cat_id;
        $article_view->save();
    	return view("articles.show", compact("article"));
    }
    function edit($id){
        $article = Article::where('article_id', '=', $id)->firstOrFail();
        $categories = Category::all(['cat_name','cat_id']);
        $users = User::all();
        return view("articles.edit",compact("article","categories","users"));
    }
    function update($id){
       $article = Article::where('article_id', '=', $id);
       $task = Task::where('article_id','=',$id)->where('user_id','=',$article->editor_id)->update(['user_id'=>$_POST['editor_id']]);
       $article->update(['title'=>$_POST['title'], 'body' => $_POST['body'], 'cat_id' => $_POST['category'],'image_url' => $_POST['image'],'video_url' => $_POST['video'], 'editor_id' => $_POST['editor']]);
       return redirect('articles');
    }
    function recent(){
       $articles = Article::orderBy('created_at','desc')->limit(5)->get();
       return $articles;
    }
    function most_view(){
        $aggregates = Article_View::select(DB::raw('article__views.article_id, count(*) as `aggregate`'))->groupBy('article_id')->orderBy('aggregate', 'desc')->limit(5)->get();
        return $aggregates;
    }
    function uploadFile($request, $name, $path,$title){

      $file_entry=""; 
      if($request->file($name) !=null){
            $file = $request->file($name);
            $input = array($name => $file);
            $destinationPath = "uploads/".$path."/";
            $filename = strtolower(str_replace(" ", "-", $title))."-".$name."." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $file_entry ="/".$destinationPath."".$filename;
      } 
      return $file_entry;
    }
}
