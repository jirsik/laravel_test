@extends('layout')

@section('content')
    
    <div style="margin:1rem; padding:1rem; background-color:cadetblue; color:white;">
            <h3>{{$movie->name}}</h3>
            <p>year: {{$movie->year}}</p>
            <p>rating: {{$movie->rating}}</p>
            <p>genres:
                @if ($movie->genres->count() === 0)
                    there is no genre for this movie
                @else
                    <ul>
                        @foreach ($movie->genres as $genre)
                            <li>{{$genre->name}}</li>
                        @endforeach
                    </ul>
                @endif

               
                
            </p>

        </div>
    
    <a href="{{action('ReviewController@index', $movie->id)}}">Show reviews</a>
    <a href="{{action('ReviewController@create', $movie->id)}}">Review</a>
    <a href="{{action('NewMovieController@index')}}">Go Back</a>
@endsection