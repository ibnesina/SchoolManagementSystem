<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkRegisterModel extends Model
{
    use HasFactory;

    protected $table = 'marks_register';

    static function checkMark($student_id, $exam_id, $class_id, $subject_id) {
        return MarkRegisterModel::where('student_id', '=', $student_id)
                                ->where('exam_id', '=', $exam_id)
                                ->where('class_id', '=', $class_id)
                                ->where('subject_id', '=', $subject_id)
                                ->first();
    }

    static function getExam($student_id) {
        return MarkRegisterModel::select('marks_register.*', 'exam.name as exam_name')
                ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
                ->where('marks_register.student_id', '=', $student_id)
                ->groupBy('marks_register.exam_id')
                ->get();
    }

    static function getExamSubject($exam_id, $student_id) {
        return MarkRegisterModel::select('marks_register.*', 'exam.name as exam_name', 'subject.name as subject_name')
                ->join('exam', 'exam.id', '=', 'marks_register.exam_id')
                ->join('subject', 'subject.id', '=', 'marks_register.subject_id') 
                ->where('marks_register.exam_id', '=', $exam_id)
                ->where('marks_register.student_id', '=', $student_id)
                ->get();
    }
    

}
