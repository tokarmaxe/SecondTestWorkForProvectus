@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are login.</div>
                <div class="panel-heading"><h1>Tasks</h1></div>
                <div class="panel-body">
                    <table style="width: 100%;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>

                        @foreach($tasks as $task)
                            <tr><td>{{$task->id}}</td><td>{{$task->name}}</td><td>{{$task->description}}</td></tr>
                        @endforeach
                    </table>
                    <a href="{{route('tasks.create')}}" class="btn btn-success" style="margin-top: 20px">Create</a>
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
