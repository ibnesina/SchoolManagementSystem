<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list() {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        // $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = "Assign Class to Teachers";
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add() {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherToAssign();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = "Add Class to Teachers";
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request) {
        if(!empty($request->teacher_id) && !empty($request->subject_id)) {
            foreach($request->teacher_id as $teacher_id) {
                foreach($request->subject_id as $subject_id) {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        } 
        return redirect('admin/assign_class_teacher/list')->with('success', "Class Successfully Assigned to Teacher!"); 
    }

    public function edit($id) {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignedTeacher'] = AssignClassTeacherModel::getAssignedTeacherId($getRecord->class_id);
            $data['getAssignedSubjectId'] = AssignClassTeacherModel::getAssignedSubjectId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['getTeacher'] = User::getTeacherToAssign();
            $data['header_title'] = "Edit Teachers for Class";
            return view('admin.assign_class_teacher.edit ', $data);
        }
        else {
            abort(404);
        }        
    }

    public function update($id, Request $request) {
        AssignClassTeacherModel::deleteSubject($request->class_id);

        if(!empty($request->teacher_id)) {
            if(!empty($request->teacher_id) && !empty($request->subject_id)) {
                foreach($request->teacher_id as $teacher_id) {
                    foreach($request->subject_id as $subject_id) {
                        $save = new AssignClassTeacherModel;
                        $save->class_id = $request->class_id;
                        $save->subject_id = $subject_id;
                        $save->teacher_id = $teacher_id;
                        $save->status = $request->status;
                        $save->created_by = Auth::user()->id;
                        $save->save();
                    }
                }
            } 
        }
        return redirect('admin/assign_class_teacher/list')->with('success', "Class Successfully Assigned to Teacher!");

        
    }

    public function delete($id) {
        $save = AssignClassTeacherModel::find($id);
        $save->delete();

        return redirect('admin/assign_class_teacher/list')->with('success', "Assigned Class Deleted Successfully!");
    }

    //Teacher Role
    public function MyClassSubject() {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = "My Classes & Subjects";
        return view('teacher.my_class_subject', $data);
    }
}
