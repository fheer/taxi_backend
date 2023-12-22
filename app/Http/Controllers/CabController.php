<?php

namespace App\Http\Controllers;

use App\Models\Cab;
use App\Http\Requests\StoreCabRequest;
use App\Http\Requests\UpdateCabRequest;

class CabController extends Controller
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
     * @param  \App\Http\Requests\StoreCabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCabRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cab  $cab
     * @return \Illuminate\Http\Response
     */
    public function show(Cab $cab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cab  $cab
     * @return \Illuminate\Http\Response
     */
    public function edit(Cab $cab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCabRequest  $request
     * @param  \App\Models\Cab  $cab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCabRequest $request, Cab $cab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cab  $cab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cab $cab)
    {
        //
    }
}
