<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactMailer;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function show(){
        return view('contact.show');
    }
    public function send(ContactRequest $request, ContactMailer $mailer): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('Sending contact mail: ', $data);
        $mailer->send($data);

        return redirect()->route('contact')->withInput($data);
    }
}
