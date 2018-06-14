<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Tag;
use App\MM;
use function PhpParser\filesInDir;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('tags.tags',['tags'=>$tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name=$request->get('tagname');
        $tag->task_id=$request->get('task_id');
        $tag->save();

        return redirect()->route('tags.index');
    }
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
