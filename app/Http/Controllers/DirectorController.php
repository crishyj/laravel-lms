<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\Director;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Grade;

class DirectorController extends Controller
{
    public function index()
    {
        return view('backend.director.index');
    }

    public function login(Request $request)
    { 
        
        $validate_array = array(
            'email'=>'required',
            'password'=>'required',
        );
        
        $request->validate($validate_array);  
      
        $login_email = $request->get('email');
        $login_password = md5($request->get('password'));
        $userType = $request->get('userType');

        if($userType == 1){
           
            if ($student = Student::where('email', $login_email)->first()) { 
               if(empty($student->password))
               {                  
                    return redirect()->route('director.index');
               }
               else
               {
                    if($login_password == $student->password)
                    {
                        Session::put('userType', $userType);
                        Session::put('studentId', $student->id);
                        return redirect('/director/index');
                    }
                    else
                    {
                        return redirect()->route('director.index');
                    }
               }
            }
        }elseif($userType == 2){
           
            if ($teacher = Teacher::where('email', $login_email)->first()) { 
               if(empty($teacher->password))
               {                  
                    return redirect()->route('director.index');
               }
               else
               {
                    if($login_password == $teacher->password)
                    {
                        Session::put('userType', $userType);
                        Session::put('teacherId', $teacher->id);
                        return redirect('/director/index');
                    }
                    else
                    {
                        return redirect()->route('director.index');
                    }
               }
            }
        }elseif($userType == 3){
           
            if ($admin = Admin::where('email', $login_email)->first()) { 
               if(empty($admin->password))
               {                  
                    return redirect()->route('director.index');
               }
               else
               {
                    if($login_password == $admin->password)
                    {
                        Session::put('userType', $userType);
                        Session::put('adminId', $admin->id);
                        return redirect('/director/index');
                    }
                    else
                    {
                        return redirect()->route('director.index');
                    }
               }
            }
        }elseif($userType == 4){
            
            $director = Director::first();
            $director_eamil = $director->email;
            $director_password = $director->password;

            if($login_email == $director_eamil){
                if($login_password == $director_password){                    
                    Session::put('userType', $userType);
                    return redirect('/director/index');
                }
                else{  
                    return redirect()->route('director.index');
                }            
            }
            else{
                return redirect()->route('director.index');
            }
        }
        
    }

    public function dashboard()
    {
        if(!Session::get('userType')){
            return redirect()->route('logout');
        }
        $students = Student::all();
        $student_count = $students->count();
        $teachers = Teacher::all();
        $teacher_count = $teachers->count();
        $classes = Classes::all();
        $classes_count = $classes->count();
        $courses = Course::all();
        $course_count = $courses->count();
        $grades = Grade::all();
        return view('backend.director.dashboard', compact('students', 'teachers', 'classes', 'courses', 'student_count', 'teacher_count', 'classes_count', 'course_count', 'grades'));
    }

    public function logout(){
        session()->flush(); 
        return redirect()->route('/');
    }
    
}
