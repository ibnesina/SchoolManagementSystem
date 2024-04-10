<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudentAddFeesModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request) {
        $data['getClass'] = ClassModel::getRecord();

        if(!empty($request->all())) {
            $data['getRecord'] = User::getCollectFeesStudent();
        }

        $data['header_title'] = "Collect Fees";
        return view('admin.fees_collection.collect_fees', $data);
    }


    public function collect_fees_add($student_id) {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;

        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);

        // dd($data['paid_amount']);
        $data['header_title'] = "Add Collect Fees";
        return view('admin.fees_collection.collect_fees_add', $data);
    }
    
    public function collect_fees_insert($student_id, Request $request) {
        $getStudent = User::getSingleClass($student_id);
        $paidAmount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id); 
        $remainingAmount = $getStudent->amount - $paidAmount;

        $payment = new StudentAddFeesModel;

        $remaining_amount_user = $remainingAmount - $request->amount;
        $payment->student_id = $student_id;
        $payment->class_id = $getStudent->class_id;
        $payment->paid_amount = $request->amount;
        $payment->total_amount = $remainingAmount;
        $payment->remaining_amount = $remaining_amount_user;
        $payment->remark = $request->remark;
        $payment->created_by = Auth::user()->id;
        $payment->save();

        return redirect()->back()->with('success', "Fees Successfully Added");
    }

    //student my_fees
    public function my_fees() {

        $data['getRecord'] = StudentAddFeesModel::where('student_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    
        // dd($data['getRecord']);
        $data['header_title'] = "My Dues";
        return view('student.collect_fees', $data);
    }

}
