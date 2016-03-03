<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use App\Category;
class TasksController extends Controller
{
    //
    function index(){
    	$tasks = Task::all();
    	return view("tasks.index", compact("tasks"));
    }
    function assign(){
    	$tasks = Task::all();
    	$users = User::all();
    	$categories = Category::all();
    	return view("tasks.assign",compact("tasks","users","categories"));
    }
}
