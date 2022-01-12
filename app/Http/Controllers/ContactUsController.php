<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\RedirectResponse;

class ContactUsController extends Controller
{
    public function view(){
        return view('contacts.contactUs');
    }
    public function send(ContactUsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('test', $data);

        return redirect()->route('contactUs')->withInput($data);
    }
}
