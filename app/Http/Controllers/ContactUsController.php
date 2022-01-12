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
        dd($request->all());
        return redirect()->route('contactUs');
    }
}
