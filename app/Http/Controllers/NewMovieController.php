<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class NewMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')->limit(10)->get();

        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::with('genres')->find($id); //Movie::findOrFail($id);  .. this will retur 404 in case, there is not a result
        if ($movie === null) {
            return "movie not found";
        } else {
            return view('movies.show', compact('movie'));
        }
        
    }
}
