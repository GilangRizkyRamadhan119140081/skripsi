<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Dinas Kebudayaan Kota Bandar Lampung',
            'body' => 'Pesan Untuk Anda!'
        ];

        Mail::to('rizkygilang122@gmail.com')->send(new DemoMail($mailData));

        dd("Email is sent successfully.");
    }
}
