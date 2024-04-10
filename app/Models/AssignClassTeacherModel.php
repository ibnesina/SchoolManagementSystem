<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';

    static public function getSingle($id) {
        return self::find($id);
    }

    static public function getRecord() {
        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 
                    'teacher.name as teacher_name', 'subject.name as subject_name', 'users.name as created_by_name')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'assign_class_teacher.created_by')
                    ->join('subject', 'subject.id', '=', 'assign_class_teacher.subject_id');
        if(!empty(Request::get('class_name'))) {                
            $return = $return->where('class.name', 'like', '%'.Request::get('class_name').'%');
        }
        if(!empty(Request::get('teacher_name'))) {                
            $return = $return->where('teacher.name', 'like', '%'.Request::get('teacher_name').'%');
        }
        if(!empty(Request::get('subject_name'))) {                
            $return = $return->where('subject.name', 'like', '%'.Request::get('subject_name').'%');
        }
        $return= $return->orderBy('assign_class_teacher.id', 'desc')->paginate(15);
        
        return $return;
    }

    static public function getMyClassSubject($teacher_id) {
        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 
                    'teacher.name as teacher_name', 'subject.name as subject_name', 'users.name as created_by_name',
                    'class.id as class_id', 'subject.id as subject_id')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'assign_class_teacher.created_by')
                    ->join('subject', 'subject.id', '=', 'assign_class_teacher.subject_id')
                    ->where('teacher.id', '=', $teacher_id)
                    ->orderBy('class.name')->paginate(15);
        return $return;
    }

    static public function getMyClassSubjectGroup($teacher_id) {
        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 
                    'teacher.name as teacher_name', 'subject.name as subject_name', 'users.name as created_by_name',
                    'class.id as class_id', 'subject.id as subject_id')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'assign_class_teacher.created_by')
                    ->join('subject', 'subject.id', '=', 'assign_class_teacher.subject_id')
                    ->where('teacher.id', '=', $teacher_id)
                    ->groupBy('assign_class_teacher.class_id')->get();
        return $return;
    }

    static public function getAssignedTeacherId($class_id) {
        return self::where('class_id', '=', $class_id)->get();
    }
    
    static public function getAssignedSubjectId($class_id) {
        return self::where('class_id', '=', $class_id)->get();
    }

    static public function deleteSubject($class_id) {
        return self::where('class_id', '=', $class_id)->delete();
    }

    static public function getTimetable($class_id, $subject_id) {
        $getWeek = WeekModel::getWeekUsingName(date('l'));
        return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);

    }
}
