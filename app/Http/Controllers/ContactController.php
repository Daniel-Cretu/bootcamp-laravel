<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactMailer;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function view(){
        return view('pages.contact');
    }
    public function send(ContactRequest $request, ContactMailer $mailer): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('Sending contact mail: ', $data);
        $mailer->send($data);

        return redirect()->route('contact')->withInput($data);
    }
}
