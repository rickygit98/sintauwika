<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use App\Models\Dosen;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Http\Request;

use App\Mail\Email;
use Nexmo\Laravel\Facade\Nexmo;

use Illuminate\Support\Facades\Mail;

class DsnTopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cari dulu ID user yang login
        $id = auth()->user()->id;

        //Ambil dari tabel dosen yang user_id nya sama dengan user_id yang sedang login, ambil yang pertama
        $dosen = Dosen::where('user_id','=',$id)->first();
        $ds_id = $dosen->id;


        //ambil topik dengan dosen1_id sama dengan ds_id
        $topiks = Topik::where('dosen_id','=',$ds_id)
        ->whereIn('status', ['Submit Pertama'])          
        ->get();

        if ($topiks->first() == null) {
            return view('/dosen/topik/index',[
                'topiks' => null,
            ]);
        } else {
            return view('/dosen/topik/index',[
                'topiks' => $topiks,
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
     * @param  \App\Models\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function show(Topik $topik)
    {

        return view ('/dosen/topik/showTopik',[
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
        $rules = [
            'status' => 'required',
            'email' => 'required',
            'contact' => 'required',
            
        ];

        $validatedData = $request->validate($rules);

        $topik->update($validatedData);

        if ($request->status == 'Ditolak') {  

            //Kirim Email
            $content = [
                'sender' => 'SINTA Uwika',
                'recipient' => $topik->mahasiswa->user->name,
                'body' => 'Skripsi anda ditolak',
            ];
    
            Mail::to($validatedData['email'])->send(new Email($content));

            //Kirim SMS
            // Nexmo::message()->send([
            //     'to' => $validatedData['contact'],
            //     'from' => 'SINTA UWIKA',
            //     'text' => 'Hi, Mahasiswa , topik anda ditolak oleh dosen pembimbing anda, segera login ke aplikasi untuk keterangan lebih lanjut'
            // ]);

            return redirect('/dosen/topik/')->with('success','Topik berhasil Ditolak');
        }
        else {    
            //Masukkan ke table skripsi
            Skripsi::create ([
                'topik_id' => $topik->id,
                'status' => 'Revisi'
            ]) ;

            //Kirim Email
            $content = [
                'sender' => 'SINTA Uwika',
                'recipient' =>  $topik->mahasiswa->user->name,
                'body' => 'Skripsi anda diterima',
            ];
    
            Mail::to($validatedData['email'])->send(new Email($content));

            //Kirim SMS
            // Nexmo::message()->send([
            //     'to' => $validatedData['contact'],
            //     'from' => 'SINTA UWIKA',
            //     'text' => 'Hi, Mahasiswa , Selamat ! topik anda diterima oleh dosen pembimbing anda, segera login ke aplikasi untuk keterangan lebih lanjut'
            // ]);

            return redirect('/dosen/topik/')->with('success','Topik berhasil Diterima');
        }
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

    public function getAllTopikByDosen1($id){
        $user = User::find($id);
        $topik = $user->topik;
        return $topik;
    }
}
