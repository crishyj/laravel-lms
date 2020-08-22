<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Assignment;

class ScoreController extends Controller
{
    public function index(){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $scores = Score::where('teacher_id', $teacher->id)->get();
        $student_ids = Score::where('teacher_id', $teacher->id)->pluck('student_id');  
        $students =Student::whereIn('id', $student_ids)->get();     
        $grades = Grade::all();
        $classes = Classes::all();        
        $assignments = Assignment::all();
        return view('backend.score.index', compact('students', 'scores', 'grades', 'classes', 'assignments'));
    }

    public function create(){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $classe_ids = Classes::where('teacher_id', $teacher->id)->pluck('id');  
        $students =Student::whereIn('classes_id', $classe_ids)->get();     
        $assignments = Assignment::all();
        return view('backend.score.create', compact('students', 'assignments'));
    }

    public function store(Request $request){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $options = new Score([
            'teacher_id' => $teacher_id,
            'student_id' => $request->get('student_id'),
            'assignment_id' => $request->get('assignment_id'),
            'score' => $request->get('score'),
        ]);
        $options->save();
        return redirect('/score/list');
    }

    public function update(Request $request){
        $options = Score::find($request->get('id'));
        $options->score = $request->get('score');
        $options->save();
        return response()->json('success');
       
    }

    public function delete($id){
        $options = Score::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }       
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }
}
