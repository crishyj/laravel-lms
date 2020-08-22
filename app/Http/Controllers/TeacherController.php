<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Classes;
use App\Models\Student;

class TeacherController extends Controller
{
    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
    }

    public function index(){
        $options = Teacher::all();
        return view('backend.teacher.index', compact('options'));
    }

    public function create(){
        return view('backend.teacher.create');
    }

    public function store(Request $request){ 

        $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
        $request->profile_image->move(public_path('profile/teacher/'), $fileName);
        $upload_file = 'profile/teacher/'.$fileName;

        $teacher = Teacher::all();
        if (Teacher::where('email', '=', $request->get('email'))->exists()) {
            echo "
                <script>
                    alert('Teacher already exist!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options = new Teacher([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'middle_name' => $request->get('middle_name'),
                'email' => $request->get('email'),
                'birthday' => $request->get('birthday'),
                'address' => $request->get('address'),
                'subject' => $request->get('subject'),
                'phone' => $request->get('phone'),
                'profile_image' => $upload_file,
            ]);
            $options->save();
            return redirect('/teacher/list');
        }
    }

    
    public function update(Request $request){
        
        $options = Teacher::find($request->get('id'));
        
        if($request->profile_image !='undefined'){
            unlink($options['profile_image']);
            $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
            $request->profile_image->move(public_path('profile/teacher/'), $fileName);
            $upload_file = 'profile/teacher/'.$fileName;
            $options->profile_image = $upload_file;
        }   
       
        $options->first_name = $request->get('first_name');
        $options->last_name = $request->get('last_name');
        $options->middle_name = $request->get('middle_name');
        $options->email = $request->get('email');
        $options->birthday = $request->get('birthday');
        $options->address = $request->get('address');
        $options->subject = $request->get('subject');
        $options->phone = $request->get('phone');
        $options->save();
        return response()->json('success');
    }

    public function delete($id){
        $options = Teacher::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        unlink($options['profile_image']);
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }

    public function teacher_class_list(){
        $teachers = Teacher::all();
        $grades = Grade::all();
        $allClasses = Classes::all();
        $classes = Classes::where('teacher_id', '!=', '')->get();
        return view('backend.teacher.classView', compact('teachers', 'grades', 'classes', 'allClasses'));
    }

    public function teacher_class_add(){
        $teachers = Teacher::all();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.teacher.classAdd', compact('teachers', 'grades', 'classes'));
    }

    public function teacher_class_store(Request $request){      
        $options = Teacher::find($request->get('id'));
        $classes = Classes::find($request->get('classes_id'));
        if ($classes->teacher_id == $request->get('id')) {
            echo "
                <script>
                    alert('Teacher already added to this Class!');                    
                </script>";
                $teachers = Teacher::all();
                $grades = Grade::all();
                $classes = Classes::all();
                return view('backend.teacher.classAdd', compact('teachers', 'grades', 'classes'));
        }
        else{
            $options->grade_id = $request->get('grade_id');
            $options->classes_id = $request->get('classes_id');
            $options->save();
            
            $classes->teacher_id = $request->get('id');
            $classes->save();
            return redirect('/teacher_class/list');
        }
        
    }


    public function teacher_class_update(Request $request){
        $options = Teacher::find($request->get('id'));
        $options->grade_id = $request->get('grade_id');
        $options->classes_id = $request->get('classes_id');
        $options->save();

        $classes = Classes::find($request->get('old_classes_id'));
        $classes->teacher_id = null;
        $classes->save();
        
        $new_classes = Classes::find($request->get('classes_id'));
        $new_classes->teacher_id = $request->get('id');
        $new_classes->save();
        return response()->json('success');
    }

    public function teacher_class_delete($id){
        $options = Teacher::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->classes_id = 0;
        $options->save();        
        return redirect('/teacher_class/list');
    }


    public function access_list(){
        $teachers = Teacher::where('password', '!=', '')->get();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.teacher.accessView', compact('teachers', 'grades', 'classes'));
    }

    public function access_create(){
        $teachers = Teacher::whereNull('password')->get();
        return view('backend.teacher.accessAdd', compact('teachers'));
    }

    public function access_store(Request $request){
        if ($request->get('password') != $request->get('confirm_password')) {
            echo "
                <script>
                    alert('Please Confirm the Password!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options = Teacher::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return redirect('/teacherAccess/list');
        }
    }

    public function access_update(Request $request){
        if ($request->get('password') != $request->get('confirm_password')) {
            return response()->json('The given data was invalid.');
        }
        else{
            $options = Teacher::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return response()->json('success');
        }
    }

    public function access_delete($id){
        $options = Teacher::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->password = null;
        $options->save();        
        return redirect('/teacherAccess/list');
    }

    public function classlist(){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $classes = Classes::where('teacher_id', $teacher->id)->get();
        $classe_grades = Classes::where('teacher_id', $teacher->id)->pluck('grade_id');       
        $grades = Grade::whereIn('id', $classe_grades)->get();
        return view('backend.teacher.classlist', compact('classes', 'grades'));
    }

    public function studentlist(){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $classes = Classes::where('teacher_id', $teacher->id)->get();
        $classe_grades = Classes::where('teacher_id', $teacher->id)->pluck('grade_id');       
        $grades = Grade::whereIn('id', $classe_grades)->get();       
        $classes_ids = Classes::select('id')->where('teacher_id', $teacher->id)->get();
        $students = Student::whereIn('classes_id', $classes_ids)->get();
        return view('backend.teacher.studentlist', compact('classes', 'grades', 'students'));
    }   
}
