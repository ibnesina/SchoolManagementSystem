<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function list() {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }

    public function add() {
        $data['getClass'] = ClassModel::getClass(); 
        $data['header_title'] = "Add New Student";
        return view('admin.student.add ', $data);
    }

    public function insert(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users',

        ]);

        $student = new User;
        $student->name = trim($request->name); 
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->religion = trim($request->religion);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->email = trim($request->email); 
        $student->password = Hash::make($request->password); 
        $student->user_type = 4;
        $student->save();
        
        return redirect('admin/student/list')->with('success', "Student created Successfully!");
    }

    public function edit($id) {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit ', $data);
        }
        else {
            abort(404);
        }
    }

    public function update($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name); 
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->religion = trim($request->religion);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);

        if(!empty($request->file('profile_pic'))) {
            if(!empty($student->getProfile())) {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->email = trim($request->email); 

        if(!empty($request->password)) {
            $student->password = Hash::make($request->password); 
        }
        
        $student->save();
        
        return redirect('admin/student/list')->with('success', "Student Updated Successfully!");
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/student/list')->with('success', "Student deleted Successfully!");
    }

    //Teacher Role
    public function MyStudent() {
        $data['getRecord'] = User::getStudentOfTeacher(Auth::user()->id);
        $data['header_title'] = "My Students";
        return view('teacher.my_student', $data);
    }
}
