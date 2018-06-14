@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login. Hello {{Auth::user()->name}}</div>
                    <div class="panel-heading"><h1>Tag {{$tag->name}}</h1></div>
                    <div class="panel-body">
                        <table style="width: 100%;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>

                            @foreach($tasks as $task)
                                <tr><td>{{$task->id}}</td><td>{{$task->name}}</td></tr>
                            @endforeach
                        </table>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection