<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Class_;

class DashboardController extends Controller
{
    public function dashboard() {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1) {
            $data['totalAdmin'] = User::getTotalUser(2);
            $data['totalStudent'] = User::getTotalUser(4);
            $data['totalTeacher'] = User::getTotalUser(3);
            $data['totalClass'] = ClassModel::getTotalClass();
            return view('superadmin.dashboard', $data);
        }
        else if(Auth::user()->user_type == 2) {
            $data['totalAdmin'] = User::getTotalUser(2);
            $data['totalStudent'] = User::getTotalUser(4);
            $data['totalTeacher'] = User::getTotalUser(3);
            $data['totalClass'] = ClassModel::getTotalClass();
            return view('admin.dashboard', $data);
        }
        else if(Auth::user()->user_type == 3) {
            $data['totalStudent'] = User::getTotalUser(4);
            $data['totalClass'] = ClassModel::getTotalClass();
            return view('teacher.dashboard', $data);
        }
        else if(Auth::user()->user_type == 4) {
            $data['roll_number'] = User::where('id', Auth::user()->id)->value('roll_number');
            $data['admission_number'] = User::where('id', Auth::user()->id)->value('admission_number');
            return view('student.dashboard', $data);
        }
    }
}
