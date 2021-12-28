<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\Skripsi;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MhsBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dapatkan id mahasiswa
        $id = auth()->user()->id;
        
        $mahasiswa = Mahasiswa::where('user_id','=',$id)->first();

        //dapatkan topik yang ID mahasiswa sama dengan user auth id
        $topiks = Topik::where('mahasiswa_id','=',$mahasiswa->id)
        ->whereIn('status', ['Diterima'])          
        ->get();

 
        if ($topiks->first() == null) {
            return view('/mahasiswa/bimbingan/index',[
                'bimbingan' => null,
            ]);
        } else {
            //dapatkan id_topiknya
            $topik_id = $topiks->first()->id;
            //dapatkan skripsi yang id topiknya = topik_id diatas
            $skripsi = Skripsi::where('topik_id','=',$topik_id)      
            ->first();
            
            //dapatkan bimbingan yang id skripsinya = skripsi_id diatas
            $bimbingan = Bimbingan::where('skripsi_id','=',$skripsi->id)->orderBy('id','DESC')->get();


            return view('/mahasiswa/bimbingan/index',[
                'bimbingan' => $bimbingan,
            ]);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bimbingan  $bimbingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bimbingan $bimbingan)
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
