<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Skripsi;
use App\Models\Dosen;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/jadwal/index',[
            'skripsi' => Skripsi::where('status','=','Approve')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin/jadwal/editJadwal',[
            'jadwal' => $jadwal,
            'dosen'=>Dosen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $rules = [
            'dosen_id' => 'required',
            'tgl_seminar' => 'required',
            'tgl_sidang' => 'required',
            'link_seminar' => 'required',
            'link_sidang' => 'required',
        ];

        $validatedData = $request->validate($rules);
        

        //dapatkan semua dosen penguji
        $dosen = Dosen::find($validatedData['dosen_id']);
        
        //isi array validatedData key penguji dengan nama dari dosen
        $validatedData['penguji'] = $dosen->user->name;
        
        //update ke table database
        $jadwal->update([
            'link_sidang' => $validatedData['link_sidang'],
            'link_seminar' => $validatedData['link_seminar'],
            'tgl_seminar' => $validatedData['tgl_seminar'],
            'tgl_sidang' => $validatedData['tgl_sidang'],
            'penguji' => $validatedData['penguji'],

        ]);

        return redirect(url('/admin/jadwal/'))->with('success','Berhasil Menetapkan Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
