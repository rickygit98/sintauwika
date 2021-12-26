<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MhsMail;
use Illuminate\Support\Facades\Mail;

class MhsEmailController extends Controller
{
    //Nanti harus dibuat dinamis dengan ambil data dari user
    public function sendEmail(){
        $content = [
            'sender' => 'Ricky Yohanes',
            'recipient' => 'Ricky Worker',
            'body' => 'This is testing mail from Ricky',
        ];

        Mail::to('rickyworker777@gmail.com')->send(new MhsMail($content));

        return redirect()->back()->with('success','Email Sent');
    }
}
