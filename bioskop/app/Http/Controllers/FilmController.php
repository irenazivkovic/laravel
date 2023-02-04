<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmovi = Film::all();

        return response()->json([
            'STATUS' => 200,
            'FILMOVI' => $filmovi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string',
            'reziser' => 'required|string',
            'godina' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'STATUS' => 404,
                'ERROR' => $validator->errors()
            ]);
        }

        $new_film = Film::create([
            'naziv' => $request->naziv,
            'reziser' => $request->reziser,
            'godina' => $request->godina
        ]);

        return response()->json([
            'STATUS' => 200,
            'MESSAGE' => 'Novi film je unet u bazu.',
            'FILM' => $new_film
        ]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $film_show = Film::find($film)->first();

        return response()->json([
            'STATUS' => 200,
            'FILM' => $film_show
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        Film::find($film)->first()->delete();

        return response()->json([
            'STATUS' => 200,
            'MESSAGE' => 'Film je obrisan.',
        ]);
    }
}
