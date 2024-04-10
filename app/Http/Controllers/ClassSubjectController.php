<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list() {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = "Assign Subject List";
        return view('admin.assign_subject.list', $data);
    }

    public function add() {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = "Assign Subject";
        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request) {
        if(!empty($request->subject_id)) {
            foreach($request->subject_id as $subject_id) {
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
        }
        return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to Class!"); 
    }

    public function edit($id) {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignedSubjectId'] = ClassSubjectModel::getAssignedSubjectId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = "Edit Class";
            return view('admin.assign_subject.edit ', $data);
        }
        else {
            abort(404);
        }        
    }

    public function update($id, Request $request) {
        // request()->validate([
        //     'email' => 'required|email|unique:users,email,'.$id
        // ]);
        ClassSubjectModel::deleteSubject($request->class_id);

        if(!empty($request->subject_id)) {
            foreach($request->subject_id as $subject_id) {
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();
            }
        }
        return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to Class!");

        
    }

    public function delete($id) {
        $save = ClassSubjectModel::find($id);
        $save->delete();

        return redirect('admin/assign_subject/list')->with('success', "Assigned Subject Deleted Successfully!");
    }
}
