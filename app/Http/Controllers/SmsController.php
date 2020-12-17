<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(Request $Request){
        return('sms');
    $nexmo = app('Nexmo\Client');
    $nexmo->message()->send([
        'to'   => '0779543692',
        'from' => '0776495791',
        'text' => 'Hi!, This is my first message by programming'
        ]);
        return redirect()->route('sms')->with('success','sms sent successfully'); 
    }
}
