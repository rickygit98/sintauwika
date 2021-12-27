<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Skripsi;
use App\Models\Topik;
use App\Models\Kategori;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
class DsnSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dapatkan id user yang sedang login
        $id = auth()->user()->id;
        $dosen = Dosen::where('user_id','=',$id)->first();

        $topik = Topik::where('dosen_id','=', $dosen->id)
        ->orderBy('id','DESC')
        ->get();
        
        return view('/dosen/skripsi/index',[
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
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Skripsi $skripsi)
    {

        return view('/dosen/skripsi/showSkripsi',[
            'skripsi'=>$skripsi,
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
        return view('/dosen/skripsi/editSkripsi',[
            'kategori'=>Kategori::all(),
            'skripsi'=>$skripsi,
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
        if ($request->statusSkripsi == 'Approve') {
           
            Skripsi::where('id','=',$skripsi->id)->update(['status' => $request->statusSkripsi]);

            Jadwal::create([
                'skripsi_id'=>$skripsi->id,
            ]);
            return redirect(url('/dosen/skripsi/'))->with('success','Berhasil Approve Skripsi');

        } else {
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

            //buat history bimbingan
            $validatedData['skripsi_id'] = $skripsi->id;

            if (!$request->file) {
                $validatedData['file'] = $request->old_file;
            } 

            $validatedData['sender'] = $skripsi->topik->dosen->user->name;

            Bimbingan::create($validatedData);
            
            return redirect(url('/dosen/skripsi/'))->with('success','Berhasil Update Skripsi');
        }
        
         
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

    public function showBimbingan(Skripsi $skripsi){

        $allBimbingan = Bimbingan::where('skripsi_id','=',$skripsi->id)->orderBy('id','DESC')->get();
        return view('/dosen/bimbingan/showBimbingan',[
            'bimbingan' =>$allBimbingan,
            'skripsi'=>$skripsi,
        ]);
    }


}
