<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $title = "movie";
        // return view('index', ['title' => $title, 'headline'=> 'Welcome']); //one way
        // return view('index')->with('title', $title);
        // return view('index')->with(compact['title']);  //with multiple variables 'first', 'second'...

        $view =  view('index')->with(['title' => $title, 'headline'=> 'Welcome']);
        $view->ad1 = "test";
        return $view;
    }
}
