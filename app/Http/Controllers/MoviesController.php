<?php

namespace App\Http\Controllers;

use App\Movie;

use App\Http\Requests\MovieRequest;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::all();
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        return Movie::create(
            $request->only([ 'title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre' ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $movie;
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Movie  $movie
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Movie $movie)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update(
            $request->only([ 'title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre' ])
        );

        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return $movie;
    }
}
