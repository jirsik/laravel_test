@extends('layout')

@section('content')

<h1>Movies</h1>
@foreach ($movies as $movie)
    <h3>{{$movie->name}}</h3>
    <p>year: {{$movie->year}}</p>
    <p>rating: {{$movie->rating}}</p>
    <a href="{{action('NewMovieController@show', $movie->id)}}">Show me more</a>
    
@endforeach

    
@endsection