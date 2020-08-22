<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Score;
use App\Models\Attand;

class StudentController extends Controller
{

    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
    }

    public function index(){
        $options = Student::all();
        $grades = Grade::all();
        return view('backend.student.index', compact('options', 'grades'));
    }

    public function create(){
        $options = Grade::all();
        return view('backend.student.create', compact('options'));
    }

    public function store(Request $request){ 

        $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
        $request->profile_image->move(public_path('profile/student/'), $fileName);
        $upload_file = 'profile/student/'.$fileName;

        $student = Student::all();
        if (Student::where('email', '=', $request->get('email'))->exists()) {
            echo "
                <script>
                    alert('Student already exist!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options = new Student([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'middle_name' => $request->get('middle_name'),
                'email' => $request->get('email'),
                'birthday' => $request->get('birthday'),
                'address' => $request->get('address'),
                'grade_id' => $request->get('grade_id'),
                'phone' => $request->get('phone'),
                'last_school' => $request->get('last_school'),
                'last_grade' => $request->get('last_grade'),
                'parent1_first' => $request->get('parent1_first'),
                'parent1_last' => $request->get('parent1_last'),
                'parent1_phone' => $request->get('parent1_phone'),
                'parent2_first' => $request->get('parent2_first'),
                'parent2_last' => $request->get('parent2_last'),
                'parent2_phone' => $request->get('parent2_phone'),
                'profile_image' => $upload_file,
            ]);
            $options->save();
            return redirect('/student/list');
        }
    }

    
    public function update(Request $request){
        
        $options = Student::find($request->get('id'));
        
        if($request->profile_image !='undefined'){
            unlink($options['profile_image']);
            $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
            $request->profile_image->move(public_path('profile/student/'), $fileName);
            $upload_file = 'profile/student/'.$fileName;
            $options->profile_image = $upload_file;
        }   
  
        $options->first_name = $request->get('first_name');
        $options->last_name = $request->get('last_name');
        $options->middle_name = $request->get('middle_name');
        $options->email = $request->get('email');
        $options->birthday = $request->get('birthday');
        $options->address = $request->get('address');
        $options->grade_id = $request->get('grade_id');
        $options->phone = $request->get('phone');
        $options->last_school = $request->get('last_school');
        $options->last_grade = $request->get('last_grade');
        $options->parent1_first = $request->get('parent1_first');
        $options->parent1_last = $request->get('parent1_last');
        $options->parent1_phone = $request->get('parent1_phone');
        $options->parent2_first = $request->get('parent2_first');
        $options->parent2_last = $request->get('parent2_last');
        $options->parent2_phone = $request->get('parent2_phone');
        $options->save();
        return response()->json('success');
    }

    public function delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        unlink($options['profile_image']);
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }

    public function student_class_list(){
        $students = Student::where('classes_id', '!=', '')->get();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.classView', compact('students', 'grades', 'classes'));
    }

    public function student_class_add(){
        $students = Student::whereNull('classes_id')->get();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.classAdd', compact('students', 'grades', 'classes'));
    }

    public function student_class_store(Request $request){      
        $options = Student::find($request->get('id'));
        if ($options->classes_id != null) {
            echo "
                <script>
                    alert('Student already added to Class!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options->grade_id = $request->get('grade_id');
            $options->classes_id = $request->get('classes_id');
            $options->save();
            return redirect('/student_class/list');
        }
    }

    public function student_class_update(Request $request){
        $options = Student::find($request->get('id'));
        $options->grade_id = $request->get('grade_id');
        $options->classes_id = $request->get('classes_id');
        $options->save();
        return response()->json('success');
    }

    public function student_class_delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->classes_id = 0;
        $options->save();        
        return redirect('/student_class/list');
    }

    public function student_course_list(){
        $students = Student::where('course_name', '!=', '')->get();
        $grades = Grade::all();
        $classes = Classes::all();
        $courses = Course::all();
        return view('backend.student.courseView', compact('students', 'grades', 'classes', 'courses'));
    }

    public function student_course_add(){
        $students = Student::all();
        $grades = Grade::all();
        $classes = Classes::all();
        $courses = Course::all();
        return view('backend.student.courseAdd', compact('students', 'grades', 'classes', 'courses'));
    }

    public function student_course_store(Request $request){      
        $options = Student::find($request->get('id'));
        if (Str::contains($options->course_name, $request->get('course_name'))) {
            echo "
                <script>
                    alert('Student already added to this Course!');                   
                    window.history.back(-1);
                </script>";
        }
        else{
            $course_name = $options->course_name . $request->get('course_name'). ", ";
            $options->course_name = $course_name;
            $options->save();
            return redirect('/student_course/list');
        }
    }

    public function student_course_update(Request $request){
        $options = Student::find($request->get('id'));
        $options->course_name = $request->get('course_name');     
        $options->save();
        return response()->json('success');
    }

    public function student_course_delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->classes_id = 0;
        $options->save();        
        return redirect('/student_class/list');
    }


    public function access_list(){
        $students = Student::where('password', '!=', '')->get();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.accessView', compact('students', 'grades', 'classes'));
    }

    public function access_create(){
        $students = Student::whereNull('password')->get();
        return view('backend.student.accessAdd', compact('students'));
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
            $options = Student::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return redirect('/studentAccess/list');
        }
    }

    public function access_update(Request $request){
        if ($request->get('password') != $request->get('confirm_password')) {
            return response()->json('The given data was invalid.');
        }
        else{
            $options = Student::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return response()->json('success');
        }
    }

    public function access_delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->password = null;
        $options->save();        
        return redirect('/studentAccess/list');
    }

    public function pending_list(){
        $students = Student::all();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.pendingView', compact('students', 'grades', 'classes'));
    }   

    public function pending_update(Request $request){
        $options = Student::find($request->get('id'));
        $options->payment = 'pending';         
        $options->save();
        return response()->json('success');
    }

    public function pending_delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->payment = null;
        $options->save();        
        return redirect('/pendingStudent/list');
    }

    public function approve_list(){
        $students = Student::all();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.approveView', compact('students', 'grades', 'classes'));
    }   

    public function approve_update(Request $request){
        $options = Student::find($request->get('id'));
        $options->payment = 'approved';         
        $options->save();
        return response()->json('success');
    }

    public function approve_delete($id){
        $options = Student::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->payment = null;
        $options->save();        
        return redirect('/approveStudent/list');
    }

    public function assign_list(){        
        $student = Student::find(session('studentId'));
        $student_id = $student->id;
        $course_array = explode(',',$student->course_name);
        $courses = Course::whereIn('name', $course_array)->get();
        $assignments = Assignment::all();
        $grades = Grade::all();
        $classes = Classes::all();
        return view('backend.student.assignlist', compact('courses', 'assignments', 'grades', 'classes'));
    }
    
    public function grades_list(){
        $student = Student::find(session('studentId'));
        $student_id = $student->id;
        $scores = Score::where('student_id', '=', $student->id)->with('assignment')->get();     
        return view('backend.student.gradelist', compact('scores'));
    }

    public function attend_list(){
        $student = Student::find(session('studentId'));
        $student_id = $student->id;    
        $attends = Attand::where('student_id', '=', $student_id)->get();
        $grade = Grade::find($student->grade_id);
        $classes = Classes::find($student->classes_id);  
        return view('backend.student.attendlist', compact('attends', 'student', 'grade', 'classes'));
    }

    public function payment_list(){
        $student = Student::find(session('studentId'));
        $grade = Grade::find($student->grade_id);
        $classes = Classes::find($student->classes_id);  
        return view('backend.student.paymentlist', compact('student', 'grade', 'classes'));
    }
}
