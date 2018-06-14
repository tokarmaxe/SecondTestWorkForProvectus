@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">You are login.</div>
                    <div class="panel-heading"><h1>Tags</h1></div>
                    <div class="panel-body">
                        <table style="width: 100%;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>DateOfCreation</th>
                            </tr>

                            @foreach($tags as $tag)
                                <tr><td>{{$tag->id}}</td><td>{{$tag->name}}</td><td>{{$tag->created_at}}</td></tr>
                            @endforeach
                        </table>
                        <a href="{{route('tags.create')}}" class="btn btn-success" style="margin-top: 20px">Create</a>
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