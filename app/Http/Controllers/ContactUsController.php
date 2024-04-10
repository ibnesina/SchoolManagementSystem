<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactus() {
        $data['getRecord'] = ContactUs::orderBy('id', 'desc')->get();
        $data['header_title'] = "Contact Messages";
        return view('superadmin.contactus', $data);
    }
}
