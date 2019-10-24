<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Genre;
use App\User;

class CollectionController extends Controller
{
    public function store()
    {
        $collection = new Collection;
        $collection->name = 'Top movies';
        $collection->description = 'second list';
        // associate the collection with the user 1
        $collection->user()->associate(2);
        // associate the collection with the genre 9 (history)
        $collection->genre()->associate(9);
        $collection->save();
        
        // attach 5 movies to the collection, giving appropriate priorities
        $collection->movies()->attach([
            624 => ['priority' => 5], 
            780 => ['priority' => 4], 
            460 => ['priority' => 3], 
            213 => ['priority' => 2], 
            316 => ['priority' => 1]
        ]);
    }

    public function user_lists()
    {
        $user = User::find(1);
        //$collections = $user->with('collections')->get();

        $collections = $user->collections()->with('movies')->get();
        return $collections;
        
    }
}
