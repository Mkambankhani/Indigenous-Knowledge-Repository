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
    	$article->image_url= $this->uploadFile($request,'image','images');
    	$article->video_url= $this->uploadFile($request,'video','videos');
    	$article->document_url= $this->uploadFile($request,'doc','docs');
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
    function uploadFile($request, $name, $path){

      $file_entry=""; 
      if($request->file($name) !=null){
            $file = $request->file($name);
            $input = array($name => $file);
            $destinationPath = "uploads/".$path."/";
            $filename = md5($file->getClientOriginalName()). "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $file_entry =$destinationPath."".$filename;
      } 
      return $file_entry;
    }
}
