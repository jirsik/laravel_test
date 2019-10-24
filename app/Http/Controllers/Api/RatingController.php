<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function index()
    {
        return Rating::all(); 
    }

    public function store()
    {
        $rating = new Rating;
        $rating->movie_id = 368;
        $rating->user_id = 12;
        $rating->value = 8;
        $rating->save();

        return 'test';
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $value = $request->input('value');
        $rating = Rating::find($id);

        if(!$rating) {
            return ['status' => 'fail', 'message' => "rating with id {$id} not found"];
        }

        $rating->value = $value;
        $rating->save();

    }
}
