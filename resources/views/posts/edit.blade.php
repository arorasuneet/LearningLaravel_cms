{{--@extends('layouts.app')--}}

@section('content')

    <h1>Edit Post</h1>

    {{--<form action="/posts/{{$post->id}}" method="post">--}}

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
        {{csrf_field()}}

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}

        {{--because php artisan route:list shows PUT|PATCH for posts.update--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">--}}

        {{--{{csrf_field()}}--}}

        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
        {{--<input type="submit" name="submit" value="UPDATE">--}}
    {{--</form>--}}
    {!! Form::close() !!}


    {{--Delete button--}}

    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}

        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}


    {{--<form method="post" action="/posts/{{$post->id}}">--}}

        {{--{{csrf_field()}}--}}

        {{--<input type="hidden" name="_method" value="DELETE">--}}

        {{--<input type="submit" value="DELETE">--}}

    {{--</form>--}}

@stop


@section('footer')

@stop