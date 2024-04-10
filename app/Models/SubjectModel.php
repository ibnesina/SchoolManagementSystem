<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getSingle($id) {
        return self::find($id);
    }

    static public function getRecord() {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'subject.created_by');
        if(!empty(Request::get('name'))) {                
            $return = $return->where('subject.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('date'))) {
            $return = $return->whereDate('subject.created_at','=',Request::get('date'));
        }
        $return= $return->orderBy('subject.id', 'desc')            
        ->paginate(10);
        
        return $return;
    }

    static public function getSubject() {
        $return = SubjectModel::select('subject.*')
                    ->join('users', 'users.id', 'subject.created_by')
                    ->where('subject.status','=', 0)
                    ->orderBy('subject.name', 'asc')
                    ->get();
        return $return;
    }
}
