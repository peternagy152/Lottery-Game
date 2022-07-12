<?php

namespace App\Http\Controllers;

use App\Models\boxitem;
use App\Http\Requests\StoreboxitemRequest;
use App\Http\Requests\UpdateboxitemRequest;

class BoxitemController extends Controller
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
     * @param  \App\Http\Requests\StoreboxitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreboxitemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boxitem  $boxitem
     * @return \Illuminate\Http\Response
     */
    public function show(boxitem $boxitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boxitem  $boxitem
     * @return \Illuminate\Http\Response
     */
    public function edit(boxitem $boxitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateboxitemRequest  $request
     * @param  \App\Models\boxitem  $boxitem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateboxitemRequest $request, boxitem $boxitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boxitem  $boxitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(boxitem $boxitem)
    {
        //
    }
}
