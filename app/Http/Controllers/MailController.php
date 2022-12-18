<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // use Request, MyTestMail;

    public function index()
    {

        $details = [
            'title' => 'PERPUSTAKAAN GASKEUN Proudly Present',
            'body' => 'Dah Beres yah bye bye'
        ];

        Mail::to('muhamaddiaz44@gmail.com')->send(new \App\Mail\MyTestMail($details));

        dd("Email sudah terkirim.");
    }
}
