<?php

namespace App\Http\Controllers;

use App\Contact_content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class ContactController extends Controller
{
    public function contact()
    {
        $contactContent = Contact_content::firstOrFail();
        return view('pages.contact',compact('contactContent'));
    }
    public function postContact(Request $r){
        $data= [
            'name' => $r -> name,
            'email' => $r -> email,
            'phone' => $r -> phone,
            'subject' => $r -> subject,
            'desci' => $r -> desci
        ];
        
        Mail::send('mail.contact', $data, function ($message) use($r) {
            $message->to('nielmoen@student.arteveldehs.be', 'Niels M.');
            $message->bcc('verheyen.kaat@outlook.com', 'Kaat');
            $message->cc($r->email, $r->name);
            $message->subject($r->subject);
        });
        
    }
}
