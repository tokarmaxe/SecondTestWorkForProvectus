@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login. Hello {{Auth::user()->name}}</div>
                    <div class="panel-heading"><h1>Create Tag</h1></div>
                    <div class="panel-body">
                        <form action="{{route('tags.store')}}" method="POST">
                            {{ csrf_field() }}
                            <label>Tag`s Name:</label><br>
                            <input type="text" name="tagname"><br>
                            <label>Task`s Id (write ids with separator "/"):</label><br>
                            <input type="text" name="task_id"><br>
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