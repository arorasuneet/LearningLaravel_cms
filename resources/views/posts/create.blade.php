{{--@extends('layouts.app')--}}

@section('content')

    <h1>Create post</h1>

    {{--<form action="/posts" method="post">--}}
    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
            {{--<input type="text" name="title" placeholder="Enter title: ">--}}
        </div>
        {{csrf_field()}}

    <div class="form-group">
        {!! Form::file('file', ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title: ">--}}
    </div>


        {{--<input type="submit" name="submit">--}}

        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}

    {{--</form>--}}
    {!! Form::close() !!}


    {{--Error handling--}}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection


@section('footer')

@endsection