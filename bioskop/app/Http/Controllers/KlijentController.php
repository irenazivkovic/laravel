<?php

namespace App\Http\Controllers;

use App\Models\Klijent;
use Illuminate\Http\Request;

class KlijentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klijenti = Klijent::all();

        return response()->json([
            'STATUS' => 200,
            'KLIJENTI' => $klijenti
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klijent  $klijent
     * @return \Illuminate\Http\Response
     */
    public function show(Klijent $klijent)
    {
        $klijent_show = Klijent::find($klijent)->first();

        return response()->json([
            'STATUS' => 200,
            'KLIJENT' => $klijent_show
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klijent  $klijent
     * @return \Illuminate\Http\Response
     */
    public function edit(Klijent $klijent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klijent  $klijent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klijent $klijent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klijent  $klijent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klijent $klijent)
    {
        //
    }
}
