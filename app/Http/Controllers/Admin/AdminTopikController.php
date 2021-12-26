<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class AdminTopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $topik = Topik::all();

        return view('/admin/topik/index',[
            'topik' => $topik,
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
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function show(Topik $topik)
    {
        return view ('/admin/topik/showTopik',[
            'topik' => $topik,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function edit(Topik $topik)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topik $topik)
    {
    
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
