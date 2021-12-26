<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skripsi;
use App\Models\Bimbingan;
use Illuminate\Http\Request;

class AdminSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skripsi = Skripsi::orderBy('id','DESC')->get();

        return view('/admin/skripsi/index',[
            'skripsi'=>$skripsi,
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
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Skripsi $skripsi)
    {
        return view('/admin/skripsi/showSkripsi',[
            'skripsi' => $skripsi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Skripsi $skripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skripsi $skripsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skripsi $skripsi)
    {
        //
    }

    // public function ajaxGetAll()
    // {
    //     $skripsi = Skripsi::orderBy('id','DESC')->get();
    //     return response()->json($skripsi);

    // }

    public function showBimbingan(Skripsi $skripsi){

        $allBimbingan = Bimbingan::where('skripsi_id','=',$skripsi->id)->orderBy('id','DESC')->get();
        return view('/admin/bimbingan/showBimbingan',[
            'bimbingan' =>$allBimbingan,
            'skripsi'=>$skripsi,
        ]);
    }

}
