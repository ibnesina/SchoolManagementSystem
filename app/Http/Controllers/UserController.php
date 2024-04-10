<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password() {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data );
    }

    public function update_change_password(Request $request) {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password Updated Successfully");
        }
        else {
            return redirect()->back()->with('error', "Incorrect Password");
        }
    }

    public function MyAccount() {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 2) {
            return view('admin.my_account', $data );
        }
        else if(Auth::user()->user_type == 3) {
            return view('teacher.my_account', $data );
        }
        else if(Auth::user()->user_type == 4) {
            return view('student.my_account', $data );
        }
       
        
    }

    public function UpdateMyAccount(Request $request) {
        if(Auth::user()->user_type == 2) {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id
            ]);
    
            $user = User::getSingle($id);
            $user->name = trim($request->name); 
            $user->email = trim($request->email); 
            $user->save();
            
            return redirect()->back()->with('success', "Account Updated Successfully!");
        }
        else if(Auth::user()->user_type == 3) {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id
            ]);

            $teacher = User::getSingle($id);

            $teacher->name = trim($request->name); 
            $teacher->qualification = trim($request->qualification);
            $teacher->gender = trim($request->gender);
            $teacher->date_of_birth = trim($request->date_of_birth);
            $teacher->mobile_number = trim($request->mobile_number);
            $teacher->current_address = trim($request->current_address);
            $teacher->permanent_address = trim($request->permanent_address);
            $teacher->religion = trim($request->religion);
            $teacher->blood_group = trim($request->blood_group);
            $teacher->marital_status = trim($request->marital_status);

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
            
            $teacher->save();
            
            return redirect()->back()->with('success', " Account Updated Successfully!");
        }
        else if(Auth::user()->user_type == 4) {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id
            ]);
    
            $student = User::getSingle($id);
            $student->name = trim($request->name); 
            $student->gender = trim($request->gender);
            $student->date_of_birth = trim($request->date_of_birth);
            $student->mobile_number = trim($request->mobile_number);
            $student->religion = trim($request->religion);
            $student->blood_group = trim($request->blood_group);
            $student->height = trim($request->height);
            $student->weight = trim($request->weight);
    
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
            
            $student->save();
            
            return redirect()->back()->with('success', "Account Updated Successfully!");
        }
        
    }
}
