<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id) {
        return self::find($id);
    }

    static public function getSingleClass($id) {
        return self::select('users.*', 'class.amount', 'class.name as class_name')
                    ->join('class', 'class.id', 'users.class_id')
                    ->where('users.id', '=', $id)
                    ->first();
    }

    static public function getAdmin() {
        $return = self::select('users.*')
                        ->where('user_type','=',2);
        if(!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }
        if(!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at','=',Request::get('date'));
        }
        $return = $return->orderBy('id', 'desc')
                        ->paginate(20);
        return $return;
    }

    static public function getStudent() {
        $return = self::select('users.*', 'class.name as class_name')
                        ->join('class', 'class.id', '=', 'users.class_id', 'left')
                        ->where('user_type','=',4 );
        if(!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
        }
        if(!empty(Request::get('date_of_birth'))) {
            $return = $return->whereDate('users.date_of_birth','=',Request::get('date_of_birth'));
        }
        $return = $return->orderBy('users.class_id', 'asc') 
                        ->orderBy('users.roll_number', 'asc')
                        ->paginate(20);
        return $return;
    }

    static public function getTeacher() {
        $return = self::select('users.*')
                        ->where('user_type','=', 3);
        if(!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
        }
        if(!empty(Request::get('date_of_birth'))) {
            $return = $return->whereDate('users.date_of_birth','=',Request::get('date_of_birth'));
        }
        $return = $return->orderBy('users.id', 'desc')
                        ->paginate(20);
        return $return;
    }

    static public function getTeacherToAssign() {
        $return = self::select('users.*')
                        ->where('user_type','=', 3);
        $return = $return->orderBy('users.id', 'desc')
                        ->get();
        return $return;
    }

    static public function getStudentOfTeacher($teacher_id) {
        $return = self::select('users.*', 'class.name as class_name')
                        ->join('class', 'class.id', '=', 'users.class_id', 'left')
                        ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
                        ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
                        ->where('user_type','=',4 );
        if(!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
        }
        if(!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%'.Request::get('class_name').'%');
        }
        $return = $return->orderBy('users.id', 'desc')
                        ->groupBy('users.id')
                        ->paginate(20);
        return $return;
    }

    static public function getStudentClass($class_id) {
        return self::select('users.*')
                        ->where('user_type','=',4 )
                        ->where('users.class_id', '=', $class_id)
                        ->orderBy('users.roll_number', 'asc')
                        ->get();
    }

    static public function getEmailSingle($email) {
        return User::where('email', '=', $email)->first();
    } 

    public function getProfile() {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)) {
            return url('upload/profile/'.$this->profile_pic);
        }
        else {
            return "";
        }
    } 

    static public function getTokenSingle($remember_token) {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    // Fees Collection
    static public function getCollectFeesStudent() {
        $return = self::select('users.*', 'class.name as class_name', 'class.amount as amount')
                        ->join('class', 'class.id', '=', 'users.class_id')
                        ->where('user_type','=',4 );

        if(!empty(Request::get('class_id'))) {
            $return = $return->where('users.class_id', '=', Request::get('class_id'));
        }
        if(!empty(Request::get('roll_number'))) {
            $return = $return->where('users.roll_number', '=', Request::get('roll_number'));
        }
        if(!empty(Request::get('full_name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('full_name').'%');
        }
        $return = $return->orderBy('users.id', 'desc')
                        ->paginate(20);
        return $return;
    }

    static public function getPaidAmount($student_id, $class_id) {
        return StudentAddFeesModel::getPaidAmount($student_id, $class_id);
    }

    //my_fees
    static public function getMyFees($id) {
        $return = self::select('users.*', 'class.name as class_name', 'class.amount as amount')
                        ->join('class', 'class.id', '=', 'users.class_id')
                        ->where('user_type','=', 4)
                        ->where('users.id', '=', $id);
        return $return;
    }

    //total user
    static public function getTotalUser($type) {
        $return = self::select('users.id')
                        ->where('user_type', '=', $type)
                        ->count();
        return $return;
    }

}
