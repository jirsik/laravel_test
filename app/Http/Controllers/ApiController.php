<?php
 
namespace App\Http\Controllers;

use DB; 
use Illuminate\Http\Request;
 
class ApiController extends Controller
{
    public function index()
    {
        // the logic of your page will be here
        $query = 'SELECT * FROM `movies` WHERE 1 ORDER BY `rating` DESC LIMIT 10';
        
        $top_movies = DB::select($query);
        return $top_movies;

        // as response we will return an array of data
        return [
            'success' => true,
            'message' => 'Response successfully returned.',
            'errors' => [],
            'data' => []
        ];
    }

    public function search_people(Request $request)
    {
        //$request = Request();
        $query = 'SELECT * FROM `people` WHERE `name` LIKE ?';
        
        $name = $request->input('name', 'Tom');
        
        return DB::select($query, ["{$name}%"]);
    }

    public function form()
    {
        return view('form');
    }

    public function handle_form()
    {
        return 'hi';
    }
}