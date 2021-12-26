<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Http\Requests\StoreBimbinganRequest;
use App\Http\Requests\UpdateBimbinganRequest;

class BimbinganController extends Controller
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
     * @param  \App\Http\Requests\StoreBimbinganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBimbinganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function show(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBimbinganRequest  $request
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBimbinganRequest $request, Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bimbingan $bimbingan)
    {
        //
    }
}
