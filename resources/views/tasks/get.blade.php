@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login. Hello {{Auth::user()->name}}</div>
                    <div class="panel-heading"><h1>Task {{$task->name}}</h1></div>
                    <div class="panel-body">
                        <table style="width: 100%;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>

                            @foreach($tags as $tag)
                                <tr><td>{{$tag->id}}</td><td>{{$tag->name}}</td></tr>
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