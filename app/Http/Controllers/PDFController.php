<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ExamScheduleModel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{

    public function generate_pdf(Request $request) {
        $data['getClass'] = ClassModel::getClasss($request->input('class_id'));
        $data['getExam'] = ExamModel::getExamm($request->input('exam_id'));

        // $examId = $request->input('exam_id');
        // $classId = $request->input('class_id');

        if(!empty($request->input('exam_id')) && !empty($request->input('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->input('exam_id'), $request->input('class_id'));
            $data['getStudent'] = User::getStudentClass($request->input('class_id'));
        }

        // dd($request->input('exam_id'));
        $pdf = Pdf::loadView('admin.examinations.myPDF', $data);

        return $pdf->download('student_marks.pdf');
        
        // $data['header_title'] = "Marks Register";
        // return view('admin.examinations.student_marks', $data);
    }
}
