<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TasksController extends Controller
{
    //
    function index(){
    	$tasks = Task::all();
    	return view("tasks.index", compact("tasks"));
    }
    function assign(){
    	
    	return view("tasks.assign");
    }
}
