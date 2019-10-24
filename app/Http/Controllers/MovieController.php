<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $orderby = $request->input('orderby', 'name');
        if  (!in_array($orderby, ['name', 'rating', 'year']))
        {
            $orderby = 'name';
        }

        $orderway = $request->input('orderway', 'asc');
        $limit = $request->input('limit', 10);
        $page = max(1, $request->input('page', 1));
        $search = $request->input('search', null);
        $year = $request->input('year', null);
        $minrating = $request->input('minrating', null);


        $query = DB::table('movies');
        $query->orderBy($orderby, $orderway)
            ->limit($limit)
            ->offset(($page - 1) * $limit);
        
        if ($search !== null) {
            $query->where('name', 'like', "%{$search}%");
            
        }

        if ($year !== null) {
            $query->where('year', $year);
            
        }

        if ($minrating !== null && $minrating <= 10 && $minrating >= 0 ) {
            $query->where('rating', '>=', $minrating);
            
        }
            


        $movies = $query->get();
        return $movies;
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $movie = \App\Movie::find($id);
        $ratings = $movie->ratings;

        $people = $movie->people;
        return $people;
    }

    public function cast_and_crew(Request $request)
    {
        $id = $request->input('id', null);
        $result = [];
        if ($id !== null) {
            $cast_ids = DB::table('movie_person')
                ->where('movie_id', $id)
                ->pluck('person_id');
            $result = DB::table('people')
                ->whereIn('id', $cast_ids)
                ->pluck('name');
        }

        return $result;
    }

    public function movie(Request $request)
    {
        //sleep(2);
        $id = $request->input('id');
        return \App\Movie::find($id);
    }

    public function top_rated()
    {        
        $result = DB::table('movies')
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get();
            //->toSql('name'); return SQL command to check

        foreach ($result as $item)
        {
            $item->rating = 
            number_format($item->rating, 1, '.', ' ');
        }

        return $result;
    }
    public function of_the_week()
    {
        $movie_id = 202;

        $movie = DB::table('movies')
            ->where('id', $movie_id)
            ->limit(1)
            ->get();
        $result['name'] = ($movie[0]->name);
        $result['poster_url'] = ($movie[0]->poster_url);
        $result['year'] = ($movie[0]->year);

        $genres = DB::table('genre_movie')
            ->where('movie_id', $movie_id)
            ->pluck('genre_id');          //returns only values of id
        foreach ($genres as $genre)
        {
            $genre_name = DB::table('genres')
                ->where('id', $genre)
                ->get('name');

            $result['genres'][] = $genre_name[0]->name;
        }
        $cast = DB::table('movie_person')
            ->where('movie_id', $movie_id)
            ->where('profession_id', '3')
            ->get();
        foreach ($cast as $star)
        {
            $star_name = DB::table('people')
                ->where('id', $star->person_id)
                ->first('name');    //return only first item
            $result['cast'][] = $star_name->name;  //because of first instead of get, there is no need to write $star_name[0]->name;
        }
        

        

        return $result;
    }
}
