<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function list() {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function add() {
        // $data['getClass'] = ClassModel::getClass(); 
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add ', $data);
    }

    public function insert(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users',

        ]);

        $teacher = new User;
        $teacher->name = trim($request->name); 
        $teacher->qualification = trim($request->qualification);
        $teacher->date_of_joining = trim($request->date_of_joining);
        $teacher->gender = trim($request->gender);
        $teacher->date_of_birth = trim($request->date_of_birth);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->current_address = trim($request->current_address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->religion = trim($request->religion);
        $teacher->blood_group = trim($request->blood_group);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->status = trim($request->status);

        if(!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->email = trim($request->email); 
        $teacher->password = Hash::make($request->password); 
        $teacher->user_type = 3;
        $teacher->save();
        
        return redirect('admin/teacher/list')->with('success', "Teacher created Successfully!");
    }

    public function edit($id) {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit ', $data);
        }
        else {
            abort(404);
        }
    }

    public function update($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $teacher = User::getSingle($id);

        $teacher->name = trim($request->name); 
        $teacher->qualification = trim($request->qualification);
        $teacher->date_of_joining = trim($request->date_of_joining);
        $teacher->gender = trim($request->gender);
        $teacher->date_of_birth = trim($request->date_of_birth);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->current_address = trim($request->current_address);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->religion = trim($request->religion);
        $teacher->blood_group = trim($request->blood_group);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->status = trim($request->status);


        if(!empty($request->file('profile_pic'))) {
            if(!empty($teacher->getProfile())) {
                unlink('upload/profile/'.$teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->email = trim($request->email); 

        if(!empty($request->password)) {
            $teacher->password = Hash::make($request->password); 
        }
        
        $teacher->save();
        
        return redirect('admin/teacher/list')->with('success', "Teacher Updated Successfully!");
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/teacher/list')->with('success', "Teacher deleted Successfully!");
    }
}
