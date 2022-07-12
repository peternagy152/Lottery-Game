<?php

namespace App\Http\Controllers;

use App\Models\winner;
use App\Http\Requests\StorewinnerRequest;
use App\Http\Requests\UpdatewinnerRequest;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorewinnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewinnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function show(winner $winner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function edit(winner $winner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewinnerRequest  $request
     * @param  \App\Models\winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewinnerRequest $request, winner $winner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function destroy(winner $winner)
    {
        //
    }
}
