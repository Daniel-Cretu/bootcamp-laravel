<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;

class ContactController extends Controller
{
    public function view(){
        return view('pages.contact');
    }
    public function send(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('test', $data);
        \Mail::send(
            'molecules.emailContact',
            [
                'email' => $data['email'],
                'name' => $data['name'],
                'messageText' => $data['message'],

            ],
            function (Message $message) use ($data) {
                $message->subject('Message from ' . $data['email']);
                $message->to('contact@pizzaslice.org');
                $message->from('no-reply@pizzaslice.org', 'Pizza Slice mailer');
            }
        );

        return redirect()->route('contact')->withInput($data);
    }
}
