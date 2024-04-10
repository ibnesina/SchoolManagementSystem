<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    use HasFactory;

    protected $table = 'exam';

    static public function getSingle($id) {
        return self::find($id);
    }
 
    static public function getRecord() {
        $return = self::select('exam.*', 'users.name as created_name')
                    ->join('users', 'users.id', '=', 'exam.created_by');
                    if(!empty(Request::get('name'))) {                
                        $return = $return->where('exam.name', 'like', '%'.Request::get('name').'%');
                    }
        $return = $return->orderBy('exam.id', 'desc')
                ->paginate(10);

        return $return;
    }

    static public function getExam() {
        $return = self::select('exam.*')
                    ->join('users', 'users.id', '=', 'exam.created_by')
                    ->orderBy('exam.name', 'asc')->get();

        return $return;
    }

    static public function getExamm($examId) {
        $return = self::select('exam.*')
                    ->join('users', 'users.id', '=', 'exam.created_by')
                    ->where('exam.id','=', $examId)
                    ->first();

        return $return;
    }
    
}
