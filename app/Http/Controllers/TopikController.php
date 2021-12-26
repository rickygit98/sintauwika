<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use App\Http\Requests\StoreTopikRequest;
use App\Http\Requests\UpdateTopikRequest;

class TopikController extends Controller
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
     * @param  \App\Http\Requests\StoreTopikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function show(Topik $topik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function edit(Topik $topik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopikRequest  $request
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopikRequest $request, Topik $topik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topik $topik)
    {
        //
    }
}
