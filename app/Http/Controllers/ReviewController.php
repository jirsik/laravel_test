<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Movie;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($movie_id)
    {
        $movie = Movie::with('reviews')->findOrFail($movie_id)->first();
        $reviews = $movie->reviews()->get();
        $movie_name = $movie->name;
        //$reviews = Review::where('movie_id', $movie)->get();
        
        return view('reviews.index', compact('reviews', 'movie_name', 'movie_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($movie_id)
    {
        $movie = Movie::find($movie_id);
        $movie_name = $movie->name;

        return view('reviews.create', compact('movie_name', 'movie_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($movie, Request $request)
    {
        $review = new Review();
        $review->user_id = 5;
        $review->movie_id = $movie;
        $review->text = $request->input('review');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect(action('ReviewController@index', $movie));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
