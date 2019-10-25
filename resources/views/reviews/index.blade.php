@extends('layout')

@section('content')

<h4>Reviews for {{$movie_name}}:</h4>
@if ($reviews->count() === 0)
    <p>This movie has not been reviewed yet</p>
    
@else
    @foreach ($reviews as $review)
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div style="margin:1rem; padding:1rem;background-color:cadetblue;color:white;">
        <p>
            comment: {{$review->text}}
        </p>
        <p>
            rating: {{$review->rating}}
        </p>
        <p>
            author: {{$review->user['name']}}
        </p>
    </div>

    @endforeach
@endif


    <a href="{{action('NewMovieController@show', $movie_id)}}">Go Back</a>
@endsection