<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\GallaryModel;
use App\Models\NoticeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contactUs(Request $request) {
        $save = new ContactUs;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->message = $request->message;
        $save->save();

        return redirect('/')->with('success', "Message Sent Successfully!"); 
    }

    public function home() {
        // $data['getRecord'] = GallaryModel::get();
        $images = GallaryModel::get();
        // return view('your_view', ['images' => $images]);

        $notice = NoticeModel::orderBy('id', 'desc')->get();

        return view('pages.home', ['images' => $images, 'notice' => $notice]);
    }
}
