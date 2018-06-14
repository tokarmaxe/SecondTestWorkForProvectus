@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login. Hello {{Auth::user()->name}}</div>
                    <div class="panel-heading"><h1>Create Task</h1></div>
                    <div class="panel-body">
                        <form action="{{route('tasks.store')}}" method="POST">
                            {{ csrf_field() }}
                            <label>Task Name:</label><br>
                            <input type="text" name="taskname"><br>
                            <label>Task description:</label><br>
                            <textarea name="description"></textarea><br>
                            <label>Task tags (write tags with separator "/"):</label><br>
                            <input type="text" name="tags"><br>
                            <input type="submit" value="Add" name="sub">
                        </form>
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
