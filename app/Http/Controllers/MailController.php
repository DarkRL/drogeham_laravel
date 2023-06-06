<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail from Laravel project',
            'body' => 'This is a test email using smtp.'
        ];

        Mail::to('')->send(new MyTestMail ($mailData));

        dd("Email has been send succesfully");
    }
}
