@extends('layout')

@section('content')
    <h1>Create review for {{$movie_name}}</h1>
    
    {!! Form::open(['action' => ['ReviewController@store', $movie_id], 'method' => 'post']) !!}

    {!! Form::label('rating', 'Rating 1 - 5: ') !!}
    {!! Form::number('rating', '5', ['required']) !!}
    {!! Form::label('review', 'Review: ') !!}
    {!! Form::text('review') !!}
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}

@endsection