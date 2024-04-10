<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\GallaryModel;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function list() {
        $data['getRecord'] = GallaryModel::orderBy('id', 'desc')->get();
        $data['header_title'] = "Gallery Image List";
        return view('admin.gallary.list', $data);
    }

    public function add() {
        $data['getClass'] = GallaryModel::all(); 
        $data['header_title'] = "Add New Image";
        return view('admin.gallary.add ', $data);
    }

    public function insert(Request $request) {
        $image = new GallaryModel;

        if(!empty($request->file('image'))) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/gallary/', $filename);

            $image->image = $filename;
        }
        $image->save();
        
        return redirect('admin/gallary/list')->with('success', "Image added Successfully!");
    }

    public function delete($id) {
        $image = GallaryModel::find($id);
        $image->delete();

        return redirect('admin/gallary/list')->with('success', "Image deleted Successfully!");
    }
}
