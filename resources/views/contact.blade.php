{{--<!DOCTYPE html>--}}
{{--<html>--}}
    {{--<head>--}}
        {{--<title>Laravel</title>--}}

        {{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}

    {{--</head>--}}
    {{--<body>--}}
        {{--<div class="container">--}}

            {{--<h1>Contact Page</h1>--}}

        {{--</div>--}}
    {{--</body>--}}
{{--</html>--}}

@extends('layouts.app')

@section('content')
    <h1>Contact page</h1>

    @if(count($people))
        <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
        </ul>
    @endif

@stop


@section('footer')
    {{--<script>alert('Hello Visitor')</script>--}}
@stop