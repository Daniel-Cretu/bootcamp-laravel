<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\Mail\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;

class ContactController extends Controller
{
    public function view(){
        return view('pages.contact');
    }
    public function send(ContactRequest $request, ContactService $mailer): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('Sending contact mail: ', $data);
        $mailer->send($data);

        return redirect()->route('contact')->withInput($data);
    }
}
