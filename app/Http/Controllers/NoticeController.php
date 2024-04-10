<?php

namespace App\Http\Controllers;

use App\Models\NoticeModel;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestStatus\Notice;

class NoticeController extends Controller
{
    public function list() {
        $data['getRecord'] = NoticeModel::orderBy('id', 'desc')->get();
        $data['header_title'] = "Notice List";
        return view('admin.notice.list', $data);
    }

    public function add() {
        $data['getClass'] = NoticeModel::all(); 
        $data['header_title'] = "Add New Image";
        return view('admin.notice.add', $data);
    }

    public function insert(Request $request) {
        $notice = new NoticeModel();

        $notice->notice = $request->notice;
        $notice->save();
        
        return redirect('admin/notice/list')->with('success', "Notice added Successfully!");
    }

    public function delete($id) {
        $image = NoticeModel::find($id);
        $image->delete();

        return redirect('admin/notice/list')->with('success', "Notice deleted Successfully!");
    }
}
