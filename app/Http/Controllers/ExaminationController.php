<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignClassTeacherModel;
use App\Models\MarkRegisterModel;
use App\Models\User;

class ExaminationController extends Controller
{
    public function exam_list() {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }
    public function exam_add() {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.add', $data);
    }

    public function exam_insert(Request $request) {
        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully created!");

    }

    public function exam_edit($id) {
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit ', $data);
        }
        else {
            abort(404);
        }
    }

    public function exam_update($id, Request $request) {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully updated!");
    }

    public function delete($id) {
        $exam = ExamModel::find($id);
        $exam->delete();

        return redirect('admin/examinations/exam/list')->with('success', "Exam deleted Successfully!");
    }

    //exam_schedule

    public function exam_schedule(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        $result = array();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));

            foreach($getSubject as $value) {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;

                $examSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if(!empty($examSchedule)) {
                    $dataS['exam_date'] = $examSchedule->exam_date;
                    $dataS['start_time'] = $examSchedule->start_time;
                    $dataS['end_time'] = $examSchedule->end_time;
                    $dataS['room_number'] = $examSchedule->room_number;
                    $dataS['full_marks'] = $examSchedule->full_marks;
                    $dataS['pass_mark'] = $examSchedule->pass_mark;
                }
                else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['pass_mark'] = '';
                }
                $result[] = $dataS;
            }   
        }

        $data['getRecord'] = $result;

        $data['header_title'] = "Exam Schedule";
        return view('admin.examinations.exam_schedule', $data);
    }

    public function exam_schedule_insert(Request $request) {
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);

        if(!empty($request->schedule)) {
            foreach($request->schedule as $schedule) {
                if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time'])
                     && !empty($schedule['room_number']) && !empty($schedule['full_marks']) && !empty($schedule['pass_mark'])) {
                        $exam = new ExamScheduleModel;
                        $exam->exam_id = $request->exam_id;
                        $exam->class_id = $request->class_id;   
                        $exam->subject_id = $schedule['subject_id'];
                        $exam->exam_date = $schedule['exam_date'];
                        $exam->start_time = $schedule['start_time'];
                        $exam->end_time = $schedule['end_time'];
                        $exam->room_number = $schedule['room_number'];
                        $exam->full_marks = $schedule['full_marks'];
                        $exam->pass_mark = $schedule['pass_mark'];
                        $exam->created_by = Auth::user()->id;
                        $exam->save();
                     }
            }
        }
        return redirect()->back()->with('success', "Exam Schedule Successfully saved!");

    }

    public function marks_register(Request $request) {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register', $data);
    }

    public function submit_marks_register(Request $request) {
        if(!empty($request->mark)) {
            foreach($request->mark as $mark) {
                $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
                $class_test = !empty($mark['class_test']) ? $mark['class_test'] : 0;
                $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

                $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
                $pass_mark = !empty($mark['pass_mark']) ? $mark['pass_mark'] : 0;

                $getMark = MarkRegisterModel::checkMark($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                if(!empty($getMark)) {
                    $save = $getMark;
                }
                else {
                    $save = new MarkRegisterModel;
                    $save->created_by = Auth::user()->id;
                }

                $save->student_id = $request->student_id;
                $save->exam_id = $request->exam_id;
                $save->class_id = $request->class_id;
                $save->subject_id = $mark['subject_id'];
                $save->home_work =$home_work;
                $save->class_test = $class_test;
                $save->exam = $exam;

                $save->full_marks = $full_marks;
                $save->pass_mark = $pass_mark;

                $save->save();

                
            }
        }
        // dd($save);

        $json['message'] = "Marks Saved Successfully";
    }

    //teacher_mark_register
    public function marks_register_teacher(Request $request) {
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);

        // dd($data['getExam']);
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "Marks Register";
        return view('teacher.marks_register', $data);
    }


    //student_marks
    public function student_marks(Request $request) {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }
        
        $data['header_title'] = "Marks Register";
        return view('admin.examinations.student_marks', $data);
    }


    //Student Side
    public function MyExamSchedule(Request $request) {
        $class_id = Auth::user()->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();

        foreach($getExam as $value) {
            $dataE = array();
            $dataE['name'] = $value->exam_name;

            $getExamSchedule = ExamScheduleModel::getExamSchedule($value->exam_id, $class_id); 
            $resultS = array();
            foreach($getExamSchedule as $value) {
                $dataS = array();
                $dataS['subject_name'] = $value->subject_name;
                $dataS['exam_date'] = $value->exam_date;
                $dataS['start_time'] = $value->start_time;
                $dataS['end_time'] = $value->end_time;
                $dataS['room_number'] = $value->room_number;
                $dataS['full_marks'] = $value->full_marks;
                $dataS['pass_mark'] = $value->pass_mark;
                $resultS[] = $dataS;
             }
             $dataE['exam'] = $resultS;
             $result[] = $dataE;

        }
        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Schedule";
        return view('student.my_exam_schedule', $data);
    }

    public function myExamResult() {
        $result = array();
        $getExam = MarkRegisterModel::getExam(Auth::user()->id);

        foreach($getExam as $value) {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarkRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);

            $dataE['subject'] = $getExamSubject;

            $dataSubject = array();
            foreach($getExamSubject as $exam) {
                $totalScore =  $exam['home_work'] + $exam['class_test'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['class_test'] = $exam['class_test'];
                $dataS['exam'] = $exam['exam'];
                $dataS['totalScore'] = $totalScore;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['pass_mark'] = $exam['pass_mark'];
                
                $dataSubject[] = $dataS;
            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
        }
        
        $data['getRecord'] = $result;

        $data['header_title'] = "My Exam Result";
        return view('student.my_exam_result', $data);
    }


    //teacher side
    public function MyExamScheduleTeacher() {
        $result = array();
        $classSubject = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        
        // dd($classSubject);
        foreach($classSubject as $CSvalue) {

            $class_id = $CSvalue->class_id;
            $getExam = ExamScheduleModel::getExam($class_id);

            foreach($getExam as $value) {
                $dataE = array();
                $dataE['class_name'] = $CSvalue->class_name;
                $dataE['name'] = $value->exam_name;
                
                $getExamSchedule = ExamScheduleModel::getExamSchedule($value->exam_id, $class_id); 
                $resultS = array();
                foreach($getExamSchedule as $value) {
                        $dataS = array();
                        $dataS['subject_name'] = $value->subject_name;
                        $dataS['exam_date'] = $value->exam_date;
                        $dataS['start_time'] = $value->start_time;
                        $dataS['end_time'] = $value->end_time;
                        $dataS['room_number'] = $value->room_number;
                        $dataS['full_marks'] = $value->full_marks;
                        $dataS['pass_mark'] = $value->pass_mark;
                        $resultS[] = $dataS;
                    
                 }
                 $dataE['exam'] = $resultS;
                 $result[] = $dataE;
    
            }
        }
        $data['getRecord'] = $result;


        $data['header_title'] = "My Exam Schedule";
        return view('teacher.my_exam_schedule', $data);
    }


}
