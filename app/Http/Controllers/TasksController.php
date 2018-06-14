<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use App\Task;
use App\Tag;

class TasksController extends Controller
{
    //contruct for auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    //function show us list of tasks
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.tasks',['tasks'=>$tasks]);
    }
    //function redirect us to tasks.create page
    public function create()
    {
        return view('tasks.create');
    }
    //function for creating new task and write it into BD
    public function store(Request $request)
    {
            $task = new Task;
            $task->name=$request->get('taskname');
            $task->description=$request->get('description');
            $task->tags=$request->get('tags');
            $task->save();
            return redirect()->route('tasks.index');
    }
    //function for geting 1 task by  ID and all its tags
    public function get($id)
    {
        $task = Task::all()->find($id);
        $tag = Tag::all();
        $tags_id = explode("/",$task->tags);
        $k=0;
        foreach ($tags_id as $tag_id) {
            $tags[$k] = Tag::all()->find($tag_id);
            $k++;
        }
        return view('tasks.get',['task'=>$task,'tags'=>$tags]);
    }
}
