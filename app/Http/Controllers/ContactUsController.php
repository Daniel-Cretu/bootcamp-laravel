<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Services\ContactUsMailer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;

class ContactUsController extends Controller
{
    public function view(){
        return view('contacts.contactUs');
    }
    public function send(ContactUsRequest $request, ContactUsMailer $mailer): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('test', $data);

        $mailer->send($data);

        return redirect()->route('contactUs')->withInput($data);
    }
}
