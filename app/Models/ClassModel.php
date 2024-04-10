<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function getSingle($id) {
        return self::find($id);
    }

    static public function getTotalClass() {
        return self::select('class.id')
                        ->count();
    }

    static public function getRecord() {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'class.created_by');
        if(!empty(Request::get('name'))) {                
            $return = $return->where('class.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('date'))) {
            $return = $return->whereDate('class.created_at','=',Request::get('date'));
        }
        $return= $return->orderBy('class.id', 'desc')            
        ->paginate(10);
        
        return $return;
    }

    static public function getClass() {
        $return = ClassModel::select('class.*')
                    ->join('users', 'users.id', 'class.created_by')
                    ->where('class.status','=', 0)
                    ->orderBy('class.name', 'asc')
                    ->get();
        return $return;
    }

    static public function getClasss($classId) {
        $class = ClassModel::select('class.*')
                    ->join('users', 'users.id', 'class.created_by')
                    ->where('class.status','=', 0)
                    ->where('class.id','=', $classId)
                    ->first(); // Use first() to retrieve a single instance
        return $class;
    }
    
}
