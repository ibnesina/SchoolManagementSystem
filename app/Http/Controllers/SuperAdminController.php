<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function list() {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('superadmin.admin.list', $data);
    }

    public function add() {
        $data['header_title'] = "Add New Admin";
        return view('superadmin.admin.add ', $data);
    }

    public function insert(Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name = trim($request->name); 
        $user->role = $request->role; 
        $user->email = trim($request->email); 
        $user->password = Hash::make($request->password); 
        $user->user_type = 2;
        $user->save();
        
        return redirect('superadmin/admin/list')->with('success', "Admin created Successfully!");
    }

    public function edit($id) {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Admin";
            return view('superadmin.admin.edit ', $data);
        }
        else {
            abort(404);
        }
        
    }

    public function update($id, Request $request) {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name); 
        $user->role = $request->role;
        $user->email = trim($request->email); 
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password); 
        }
        $user->save();
        
        return redirect('superadmin/admin/list')->with('success', "Admin updated Successfully!");
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('superadmin/admin/list')->with('success', "Admin deleted Successfully!");
    }
}
