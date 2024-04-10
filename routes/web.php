<?php

use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\AssignClassTeacherModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home']);
Route::post('/', [HomeController::class, 'contactUs']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
});


Route::group(['middleware' => 'superadmin'], function() {
    Route::get('superadmin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('superadmin/admin/list', [SuperAdminController::class, 'list']);
    Route::get('superadmin/admin/add', [SuperAdminController::class, 'add']);
    Route::post('superadmin/admin/add', [SuperAdminController::class, 'insert']);
    Route::get('superadmin/admin/edit/{id}', [SuperAdminController::class, 'edit']);
    Route::post('superadmin/admin/edit/{id}', [SuperAdminController::class, 'update']);
    Route::get('superadmin/admin/delete/{id}', [SuperAdminController::class, 'delete']);

    //change_password
    Route::get('superadmin/change_password', [UserController::class, 'change_password']);
    Route::post('superadmin/change_password', [UserController::class, 'update_change_password']);

    //contact
    Route::get('superadmin/contactus', [ContactUsController::class, 'contactus']);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    //subject url
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

    //assign_subject url
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);

    //assign_class_teacher
    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);

    //change_password
    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //student url
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

    //teacher url
    Route::get('admin/teacher/list', [TeacherController::class, 'list']);
    Route::get('admin/teacher/add', [TeacherController::class, 'add']);
    Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    //my account
    Route::get('admin/account', [UserController::class, 'MyAccount']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccount']);

    //class_timetable
    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add', [ClassTimetableController::class, 'insert_update']);
    
    //exam url
    Route::get('admin/examinations/exam/list', [ExaminationController::class, 'exam_list']);
    Route::get('admin/examinations/exam/add', [ExaminationController::class, 'exam_add']);
    Route::post('admin/examinations/exam/add', [ExaminationController::class, 'exam_insert']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationController::class, 'delete']);

    //exam_schedule
    Route::get('admin/examinations/exam_schedule', [ExaminationController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_insert', [ExaminationController::class, 'exam_schedule_insert']);
    
    //marks_register
    Route::get('admin/examinations/marks_register', [ExaminationController::class, 'marks_register']);
    Route::post('admin/examinations/submit_marks_register', [ExaminationController::class, 'submit_marks_register']);

    //student_marks
    Route::get('admin/examinations/student_marks', [ExaminationController::class, 'student_marks']);

     //pdf_marks
     Route::get('admin/examinations/generate_pdf', [PDFController::class, 'generate_pdf'])->name('generate_pdf');

    // admin/fees_collection/collect_fees
    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'collect_fees']);
    Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_add']);
    Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}', [FeesCollectionController::class, 'collect_fees_insert']);

    //contact
    Route::get('admin/contactus', [ContactUsController::class, 'contactus']);

    //gallary
    Route::get('admin/gallary/list', [GallaryController::class, 'list']);
    Route::get('admin/gallary/add', [GallaryController::class, 'add']);
    Route::post('admin/gallary/add', [GallaryController::class, 'insert']);
    Route::get('admin/gallary/delete/{id}', [GallaryController::class, 'delete']);

    //notice
    Route::get('admin/notice/list', [NoticeController::class, 'list']);
    Route::get('admin/notice/add', [NoticeController::class, 'add']);
    Route::post('admin/notice/add', [NoticeController::class, 'insert']);
    Route::get('admin/notice/delete/{id}', [NoticeController::class, 'delete']);
});

Route::group(['middleware' => 'teacher'], function() {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    //change_password
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    //my account
    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);

    //my_class_subject
    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);

    //class_timetable
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);

    //my_student
    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);

    //my_exam_schedule
    Route::get('teacher/my_exam_schedule', [ExaminationController::class, 'MyExamScheduleTeacher']);

    //mark_register
    Route::get('teacher/marks_register', [ExaminationController::class, 'marks_register_teacher']);
    Route::post('teacher/submit_marks_register', [ExaminationController::class, 'submit_marks_register']);
});

Route::group(['middleware' => 'student'], function() {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    //change_password
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    //my account
    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccount']);
    
    //my_subject
    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
    Route::post('student/my_subject', [SubjectController::class, 'UpdateMyAccount']);

    //my_timetable
    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);

    // my_exam_schedule
    Route::get('student/my_exam_schedule', [ExaminationController::class, 'MyExamSchedule']);

    // my_exam_result
    Route::get('student/my_exam_result', [ExaminationController::class, 'myExamResult']);

    //my_fees
    Route::get('student/my_fees', [FeesCollectionController::class, 'my_fees']);
});