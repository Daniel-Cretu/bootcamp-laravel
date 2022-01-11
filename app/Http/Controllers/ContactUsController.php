<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\RedirectResponse;
class ContactUsController extends Controller
{
    public function view(){
        return view('contacts.contactUs');
    }
    public function send(): RedirectResponse
    {
        return redirect()->route('contactUs');
    }
}
