@extends('layout')

@section('content')
    <h3>{{$movie->name}}</h3>
    <a href="{{action('ReviewController@index', $movie->id)}}">Show reviews</a>
    <a href="{{action('NewMovieController@index')}}">Go Back</a>
@endsection