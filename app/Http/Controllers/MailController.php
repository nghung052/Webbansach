<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $id = 1;
        Mail::to('blackbuller123@gmail.com')->send(new \App\Mail\RegisterEmail($id));
        trans('passwords.throttled');
    }
}
