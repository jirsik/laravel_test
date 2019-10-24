<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Route::get('/test/form', 'ApiController@form');
Route::post('/test/form', 'ApiController@handle_form');


Route::get('/api', 'ApiController@index');
Route::get('/api/search', 'ApiController@search_people');

Route::get('/api/movie', 'MovieController@movie');
Route::get('/api/movie-index', 'MovieController@index');
Route::get('/api/movie-cast', 'MovieController@cast_and_crew');
Route::get('/api/movie-show', 'MovieController@show');


Route::get('/api/review', 'Api\ReviewController@index');
Route::post('/api/review', 'Api\ReviewController@store');

Route::get('/api/rating', 'Api\RatingController@index');
Route::post('/api/rating', 'Api\RatingController@store');
Route::put('/api/rating', 'Api\RatingController@update');




//route::resource('/api/review', 'ReviewController');

//route::resource('api/rating', 'RatingController');


//day29 morning exercise

Route::get('/api/movie/top_rated', 'MovieController@top_rated');
Route::get('/api/movie/of_the_week', 'MovieController@of_the_week');

//day 31 collections
Route::post('/api/collection', 'CollectionController@store');
Route::get('/api/list/user', 'CollectionController@user_lists');

//day32 morning workout - favourite movie
Route::post('/api/movies/favorite/toggle', 'Api\FavouriteMovieController@toggle');
Route::get('/api/movies/favorite', 'Api\FavouriteMovieController@status');

//day34 
Route::get('/movies', 'NewMovieController@index');
Route::get('/movies/{id}', 'NewMovieController@show');
Route::get('/movies/{movie}/reviews', 'ReviewController@index');