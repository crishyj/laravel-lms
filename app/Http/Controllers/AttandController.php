<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Classes;
use App\Models\Attand;


class AttandController extends Controller
{
    public function index(){
        $teacher = Teacher::find(session('teacherId'));
        $attanded_student_array = Attand::whereDate('status', date('Y-m-d'))->pluck('student_id');
        if($attanded_student_array->count() != 0){         
            $student_list = Student::whereIn('id', $attanded_student_array)->get();
            $classes = Classes::where('teacher_id', '=',$teacher->id)->get();
            $classe = Classes::where('teacher_id', '=',$teacher->id)->get()->pluck('id');
            $classes_id = $classe[0];
            $students = Student::where('classes_id', '=', $classes_id)->get();
            $grades = Grade::all();
            $attends = Attand::where('status', date('Y-m-d'))->get();         
            return view('backend.attend.index', compact('teacher', 'students', 'grades', 'classes', 'attends'));
        }
        else{
            $students = [];
            $attends = [];
            return view('backend.attend.index', compact('students', 'attends'));      
        }

    }

    public function create(){
        $teacher = Teacher::find(session('teacherId'));
        $attanded_student_array = Attand::whereDate('status', date('Y-m-d'))->pluck('student_id');
     
        if(count($attanded_student_array) == 0){
            $classe_ids = Classes::where('teacher_id', $teacher->id)->pluck('id');  
            $students =Student::whereNotIn('id', $attanded_student_array)->whereIn('classes_id', $classe_ids)->get();     
           
        }else{
            $students = Student::whereNotIn('id', $attanded_student_array)->get();
            $grades = Grade::all();
            $classes = Classes::all();
            $attends = Attand::where('status', date('Y-m-d'))->get();    
        }
        
        $grades = Grade::all();
        $classes = Classes::all();
        $attends = Attand::all();
        return view('backend.attend.create', compact('teacher', 'students', 'grades', 'classes', 'attends'));
    }

    public function store(Request $request){
        $options = new Attand([
            'student_id'=>$request->get('student_id'),      
            'status'=>$request->get('status'),
         ]);
         $options->save();
         return response()->json('success');
    }

    public function update(Request $request){
   
    }

    public function delete($id){
        $options = Attand::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }                 
        $options->delete();       
        return redirect('/attend/create');     
        return back()->with('success', 'Deleted Successfully');
    }
}
