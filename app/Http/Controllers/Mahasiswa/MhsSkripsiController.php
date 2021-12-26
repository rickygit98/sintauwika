<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\Dosen;
use App\Models\Skripsi;
use App\Models\Bimbingan;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MhsSkripsiController extends Controller
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
            return view('/mahasiswa/skripsi/index',[
                'skripsi' => null,
            ]);
        } else {
            //dapatkan id_topiknya
            $topik_id = $topiks->first()->id;
      
            //dapatkan skripsi yang id topiknya = sk_id diatas
            $skripsi = Skripsi::where('topik_id','=',$topik_id)->first();
            return view('/mahasiswa/skripsi/index',[
                'skripsi' => $skripsi,
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
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Skripsi $skripsi)
    {
        return view('/mahasiswa/skripsi/showSkripsi',[
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
        return view('/mahasiswa/skripsi/editSkripsi',[
            'skripsi' => $skripsi,
            'kategori' => Kategori::all(),
        ]);
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
        //id yang lain sudah ada di topik
        $validatedData = $request->validate([
            'subject' => 'required',
            'comment' => 'required',
            'file'=> 'file',
        ]);

        $validatedData['status'] = 'Revisi';
        
        if ($request->link) {
            $validatedData['link'] = $request->link;
        }
        if ($request->file) {
            // if ($request->old_file) {
            //     Storage::delete($request->old_file);
            // } 
            $file = $request->file;
            $fileName = $file->getClientOriginalName();
            $validatedData['file'] = $request->file('file')->storeAs(
                'file-skripsi', $fileName
            );
        }

        Skripsi::where('id','=',$skripsi->id)->update($validatedData);

        $validatedData['skripsi_id'] = $skripsi->id;

        $validatedData['sender'] = $skripsi->topik->mahasiswa->user->name;
        
        Bimbingan::create($validatedData);

        return redirect('/mahasiswa/skripsi/')->with('success','Skripsi anda berhasil diupdate :)');

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

    
}
