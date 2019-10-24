<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FavouriteMovie;

class FavouriteMovieController extends Controller
{
    public function toggle(Request $request)
    {
        $user_id = $request->input('user_id');
        $movie_id = $request->input('movie_id');

        $favourite_movie = FavouriteMovie::where('user_id', $user_id)->where('movie_id', $movie_id)->first();
        if ($favourite_movie === null) {
            $favourite_movie = new FavouriteMovie;
            $favourite_movie->user_id = $user_id;
            $favourite_movie->movie_id = $movie_id;
            $favourite_movie->save();

            return [
                'status' => 'success',
                'message' => 'Movie was added to favourites',
                'data' => [
                    'favourite' => true
                ]
            ];
        } else {
            $favourite_movie->delete();

            return [
                'status' => 'success',
                'message' => 'Movie was removed from favourites',
                'data' => [
                    'favourite' => false
                ]
            ];
        }
    }

    public function status(Request $request)
    {
        $user_id = $request->input('user_id');
        $movie_id = $request->input('movie_id');

        $favourite_movie = FavouriteMovie::where('user_id', $user_id)->where('movie_id', $movie_id)->first();
        if ($favourite_movie === null) {
            return [
                'favourite' => false
            ];
        } else {
            return [
                'favourite' => true
            ];
        }
    }
}
