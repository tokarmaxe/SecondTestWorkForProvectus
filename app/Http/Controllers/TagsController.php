<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Tag;
use App\MM;
use function PhpParser\filesInDir;

class TagsController extends Controller
{
    //contruct for auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    //function show us list of tags
    public function index()
    {
        $tags = Tag::all();

        return view('tags.tags',['tags'=>$tags]);
    }
    //function redirect us to tags.create page
    public function create()
    {
        return view('tags.create');
    }
    //function for creating new tag and write it into BD
    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name=$request->get('tagname');
        $tag->task_id=$request->get('task_id');
        $tag->save();

        return redirect()->route('tags.index');
    }
    //function for geting 1 tag by  ID and all its tasks
    public function get($id)
    {
        $tag = Tag::all()->find($id);
        $mm_tags = MM::all()->where('tags_id', '=', $id);
        $k = 0;
        foreach ($mm_tags as $item) {
            $task[$k] = Task::all()->find($item['task_id']);
            $k++;
        }
        return view('tags.get', ['tag' => $tag, 'mm_tags' => $mm_tags, 'tasks' => $task]);
    }
}
