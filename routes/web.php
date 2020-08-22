<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/home');
})->name('/');

Route::get('/about', function () {
    return view('frontend/about');
})->name('frontend.about');

Route::get('lang/{locale}', 'HomeController@lang');


Route::get('logout', 'DirectorController@logout')->name('logout');

Route::get('/login', 'DirectorController@index')->name('director.index');
Route::post('/login', 'DirectorController@login')->name('director.login');
Route::get('/director/index', 'DirectorController@dashboard')->name('director.dashboard');

Route::get('/admin/list', 'AdminController@index')->name('admin.list');
Route::get('/admin/create_admin', 'AdminController@create')->name('admin.create');
Route::post('/admin/create_admin', 'AdminController@store')->name('admin.store');
Route::get('/admin/list/{id}', 'AdminController@delete')->name('admin.delete');
Route::post('/admin/list', 'AdminController@update')->name('admin.update');

Route::get('/adminAccess/list', 'AdminController@access_list')->name('adminAccess.list');
Route::get('/adminAccess/create', 'AdminController@access_create')->name('adminAccess.create');
Route::post('/adminAccess/create', 'AdminController@access_store')->name('adminAccess.store');
Route::get('/adminAccess/list/{id}', 'AdminController@access_delete')->name('adminAccess.delete');
Route::post('/adminAccess/list', 'AdminController@access_update')->name('adminAccess.update');

Route::get('/teacher/list', 'TeacherController@index')->name('teacher.list');
Route::get('/teacher/create_teacher', 'TeacherController@create')->name('teacher.create');
Route::post('/teacher/create_teacher', 'TeacherController@store')->name('teacher.store');
Route::get('/teacher/list/{id}', 'TeacherController@delete')->name('teacher.delete');
Route::post('/teacher/list', 'TeacherController@update')->name('teacher.update');

Route::get('/teacher_class/list', 'TeacherController@teacher_class_list')->name('teacher.teacher_class_list');
Route::get('/teacher_class/add_teacher_class', 'TeacherController@teacher_class_add')->name('teacher.teacher_class_add');
Route::post('/teacher_class/add_teacher_class', 'TeacherController@teacher_class_store')->name('teacher.teacher_class_store');
Route::get('/teacher_class/list/{id}', 'TeacherController@teacher_class_delete')->name('teacher.teacher_class_delete');
Route::post('/teacher_class/list', 'TeacherController@teacher_class_update')->name('teacher.teacher_class_update');

Route::get('/teacherAccess/list', 'TeacherController@access_list')->name('teacherAccess.list');
Route::get('/teacherAccess/create', 'TeacherController@access_create')->name('teacherAccess.create');
Route::post('/teacherAccess/create', 'TeacherController@access_store')->name('teacherAccess.store');
Route::get('/teacherAccess/list/{id}', 'TeacherController@access_delete')->name('teacherAccess.delete');
Route::post('/teacherAccess/list', 'TeacherController@access_update')->name('teacherAccess.update');

Route::get('/view/classlist', 'TeacherController@classlist')->name('class.list');
Route::get('/view/studentlist', 'TeacherController@studentlist')->name('substudent.list');
Route::post('/view/studentlist', 'TeacherController@chooseClasses')->name('substudent.chooseClasses');

Route::get('/student/list', 'StudentController@index')->name('student.list');
Route::get('/student/create_student', 'StudentController@create')->name('student.create');
Route::post('/student/create_student', 'StudentController@store')->name('student.store');
Route::get('/student/list/{id}', 'StudentController@delete')->name('student.delete');
Route::post('/student/list', 'StudentController@update')->name('student.update');

Route::get('/student_class/list', 'StudentController@student_class_list')->name('student.student_class_list');
Route::get('/student_class/add_student_class', 'StudentController@student_class_add')->name('student.student_class_add');
Route::post('/student_class/add_student_class', 'StudentController@student_class_store')->name('student.student_class_store');
Route::get('/student_class/list/{id}', 'StudentController@student_class_delete')->name('student.student_class_delete');
Route::post('/student_class/list', 'StudentController@student_class_update')->name('student.student_class_update');

Route::get('/student_course/list', 'StudentController@student_course_list')->name('student.student_course_list');
Route::get('/student_course/add_student_course', 'StudentController@student_course_add')->name('student.student_course_add');
Route::post('/student_course/add_student_course', 'StudentController@student_course_store')->name('student.student_course_store');
Route::get('/student_course/list/{id}', 'StudentController@student_course_delete')->name('student.student_course_delete');
Route::post('/student_course/list', 'StudentController@student_course_update')->name('student.student_course_update');

Route::get('/studentAccess/list', 'StudentController@access_list')->name('studentAccess.list');
Route::get('/studentAccess/create', 'StudentController@access_create')->name('studentAccess.create');
Route::post('/studentAccess/create', 'StudentController@access_store')->name('studentAccess.store');
Route::get('/studentAccess/list/{id}', 'StudentController@access_delete')->name('studentAccess.delete');
Route::post('/studentAccess/list', 'StudentController@access_update')->name('studentAccess.update');

Route::get('/student/assignlist', 'StudentController@assign_list')->name('student.assign');
Route::get('/student/gradeslist', 'StudentController@grades_list')->name('student.grades');
Route::get('/student/attendlist', 'StudentController@attend_list')->name('student.attend');
Route::get('/student/paymentlist', 'StudentController@payment_list')->name('student.payment');

Route::get('/pendingStudent/list', 'StudentController@pending_list')->name('pendingStudent.list');
Route::post('/pendingStudent/list', 'StudentController@pending_update')->name('pendingStudent.update');
Route::get('/pendingStudent/list/{id}', 'StudentController@pending_delete')->name('pendingStudent.delete');

Route::get('/approveStudent/list', 'StudentController@approve_list')->name('approveStudent.list');
Route::post('/approveStudent/list', 'StudentController@approve_update')->name('approveStudent.update');
Route::get('/approveStudent/list/{id}', 'StudentController@approve_delete')->name('approveStudent.delete');

Route::get('/grade/list', 'GradeController@index')->name('grade.list');
Route::get('/grade/create_grade', 'GradeController@create')->name('grade.create');
Route::post('/grade/create_grade', 'GradeController@store')->name('grade.store');
Route::get('/grade/list/{id}', 'GradeController@delete')->name('grade.delete');
Route::post('/grade/list', 'GradeController@update')->name('grade.update');

Route::get('/classes/list', 'ClassesController@index')->name('classes.list');
Route::get('/classes/create_class', 'ClassesController@create')->name('classes.create');
Route::post('/classes/create_class', 'ClassesController@store')->name('classes.store');
Route::get('/classes/list/{id}', 'ClassesController@delete')->name('classes.delete');
Route::post('/classes/list', 'ClassesController@update')->name('classes.update');

Route::get('/course/list', 'CourseController@index')->name('course.list');
Route::get('/course/create_course', 'CourseController@create')->name('course.create');
Route::post('/course/create_course', 'CourseController@store')->name('course.store');
Route::get('/course/list/{id}', 'CourseController@delete')->name('course.delete');
Route::post('/course/list', 'CourseController@update')->name('course.update');

Route::get('/assignment/list', 'AssignmentController@index')->name('assignment.list');
Route::get('/assignment/create', 'AssignmentController@create')->name('assignment.create');
Route::post('/assignment/create', 'AssignmentController@store')->name('assignment.store');
Route::get('/assignment/list/{id}', 'AssignmentController@delete')->name('assignment.delete');
Route::post('/assignment/list', 'AssignmentController@update')->name('assignment.update');

Route::get('/teacherAssign/list', 'AssignmentController@teacher_index')->name('teacher_assign.list');
Route::get('/teacherAssign/create', 'AssignmentController@teacher_create')->name('teacher_assign.create');
Route::post('/teacherAssign/create', 'AssignmentController@teacher_store')->name('teacher_assign.store');
Route::get('/teacherAssign/list/{id}', 'AssignmentController@teacher_delete')->name('teacher_assign.delete');
Route::post('/teacherAssign/list', 'AssignmentController@teacher_update')->name('teacher_assign.update');

Route::get('/attend/list', 'AttandController@index')->name('attend.list');
Route::get('/attend/create', 'AttandController@create')->name('attend.create');
Route::post('/attend/create', 'AttandController@store')->name('attend.store');
Route::get('/attend/list/{id}', 'AttandController@delete')->name('attend.delete');

Route::get('/score/list', 'ScoreController@index')->name('score.list');
Route::get('/score/create', 'ScoreController@create')->name('score.create');
Route::post('/score/create', 'ScoreController@store')->name('score.store');
Route::get('/score/list/{id}', 'ScoreController@delete')->name('score.delete');
Route::post('/score/list', 'ScoreController@update')->name('score.update');