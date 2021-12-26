<?php

namespace App\Http\Controllers;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    // public function sendSms(){
    //     Nexmo::message()->send([
    //         'to' => '628988887288',
    //         'from' => 'SINTA UWIKA',
    //         'text' => 'text sms'
    //     ]);
    //     echo 'message sent';
    // }

    public function sendSms(){

        $to = "628988887288";
        $from = getenv("TWILIO_FROM");
        $message = 'Hello from Twilio!';
        //open connection

        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
        curl_setopt($ch, CURLOPT_POST, 3);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);

        // execute post
        $result = curl_exec($ch);
        $result = json_decode($result);

        // close connection
        curl_close($ch);
        //Sending message ends here

        return [$result];
    }
}
