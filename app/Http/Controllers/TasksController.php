<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use App\Task;
use App\Tag;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::all();

        return view('tasks.tasks',['tasks'=>$tasks]);
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(Request $request)
    {
            $task = new Task;
            $task->name=$request->get('taskname');
            $task->description=$request->get('description');
            $task->tags=$request->get('tags');
            $task->save();
            return redirect()->route('tasks.index');
    }
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
