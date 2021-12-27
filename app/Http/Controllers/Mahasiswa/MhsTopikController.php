<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\Dosen;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use App\Models\DosenTopik;

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
class MhsTopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $mahasiswa = Mahasiswa::where('user_id','=',$id)->first();

        $topik = Topik::where('mahasiswa_id','=',$mahasiswa->id)->get();
        return view('/mahasiswa/topik/index',[
            'topik'=>$topik,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;

        $mahasiswa = Mahasiswa::where('user_id',$id)->first();

        return view('/mahasiswa/topik/createTopik',[
            'kategori' => Kategori::all(),
            'dosen' => Dosen::all(),
            'mahasiswa'=>$mahasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'dosen_id' => 'required',
            'kategori_id' => 'required',
            'title' => 'required|unique:topiks',
            'comment' => 'required',
        ]);    
        
        $validatedData['status'] = 'Submit Pertama';
        
        $dosen = Dosen::find($validatedData['dosen_id']);
        $dosen_email = $dosen->user->email;

        $topik = Topik::create($validatedData);
      
        //Kirim Email
        $content = [
            'sender' => 'SINTA Uwika',
            'recipient' => $dosen->user->name,
            'body' => 'Ada Pengajuan Topik dari mahasiswa Anda , silakan login ke aplikasi untuk keterangan lengkap',
        ];

        Mail::to($dosen_email)->send(new Email($content));

        
        return redirect(url('/mahasiswa/topik/'))->with('success','Topik anda berhasil diajukan silakan tunggu pemberitahuan berikutnya :)');
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
