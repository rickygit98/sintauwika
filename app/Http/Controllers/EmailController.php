<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //Nanti harus dibuat dinamis dengan ambil data dari user
    public function sendEmail(){
        $content = [
            'sender' => 'Ricky Yohanes',
            'recipient' => 'Ricky Worker',
            'body' => 'This is testing mail from Ricky',
        ];

        Mail::to('rickyworker777@gmail.com')->send(new Email($content));

        return redirect()->back()->with('success','Email Sent');
    }
}
