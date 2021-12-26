<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Bimbingan;
use Dompdf\Dompdf;
use Dompdf\Options;

class kartuBimbinganController extends Controller
{
    public function print(Skripsi $skripsi){
        $bimbingan = Bimbingan::where('skripsi_id',$skripsi->id)
        ->latest() //ambil skripsi urut dari yang paling akhir
        ->take(3)  //ambil 3 terakhir
        ->get();   //get all

        return view('kartuBimbinganPrint',[
            'skripsi'=>$skripsi,
            'bimbingan'=>$bimbingan,
        ]);
    }
    
    public function downloadPdf(Skripsi $skripsi){

        $bimbingan = Bimbingan::where('skripsi_id',$skripsi->id)
        ->latest() //ambil skripsi urut dari yang paling akhir
        ->take(3)  //ambil 3 terakhir
        ->get();   //get all

        $html =  view('kartuBimbinganPdf',[
            'skripsi'=>$skripsi,
            'bimbingan'=>$bimbingan,
        ]);


        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $options->isHtml5ParserEnabled(true);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        
        $dompdf->loadHtml($html);
        
        $options = $dompdf->getOptions();
        
        $dompdf->setOptions($options);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream('kartuBimbingan.pdf',['attachment'=>true]);
    }
}
