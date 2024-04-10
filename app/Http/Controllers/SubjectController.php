<?php

namespace App\Http\Controllers;

use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list() {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }

    public function add() {
        $data['header_title'] = "Add New Class";
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request) {
        $save = new SubjectModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/subject/list')->with('success', "Subject Created Successfully!"); 
    }

    public function edit($id) {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Class";
            return view('admin.subject.edit ', $data);
        }
        else {
            abort(404);
        }        
    }

    public function update($id, Request $request) {
        // request()->validate([
        //     'email' => 'required|email|unique:users,email,'.$id
        // ]);

        $save = SubjectModel::getSingle($id);
        $save->name = $request->name; 
        $save->status = $request->status; 
        $save ->save();
        
        return redirect('admin/subject/list')->with('success', "Subject Updated Successfully!");
    }

    public function delete($id) {
        $save = SubjectModel::find($id);
        $save->delete();

        return redirect('admin/subject/list')->with('success', "Subject Deleted Successfully!");
    }

    public function MySubject() {
        $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = "My Subject";
        return view('student.my_subject ', $data);
    }
}
