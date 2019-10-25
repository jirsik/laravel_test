@extends('layout')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Create review for {{$movie_name}}</h1>
    
    {!! Form::open(['action' => ['ReviewController@store', $movie_id], 'method' => 'post']) !!}
    {!! Form::label('rating', 'Rating 1 - 5: ') !!}
    {!! Form::number('rating', '5', ['required', 'style' => $errors->has('rating')?'border: 1px solid red;': '']) !!}
        {{$errors->first('rating')}}
    <br>
    {!! Form::label('review', 'Review: ') !!}
    {!! Form::text('review', '', ['placeholder' => 'wtf']) !!}
        {{$errors->first('review')}}
    <br>
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}

@endsection