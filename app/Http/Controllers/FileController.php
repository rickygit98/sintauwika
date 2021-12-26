<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function download(Request $request){
        // return $request;
        //karena di file database sudah ada path file-skripsi maka kita masukkan nama filenya saja sebagai parameter
        //jadi cara bacanya adalah dari routedownload_public/?file=file-skripsi/{{ $request->nama_file }}
        if (Storage::disk('public')->exists($request->file)){
            $path = Storage::disk('public')->path($request->file);
           
            // $content = file_get_contents($path);
            // return response($content)->withHeaders([
            //     'Content-Type' => mime_content_type($path),  
            // ]);

            return response()->download($path);
        }
        return redirect('/404');
    }
}
