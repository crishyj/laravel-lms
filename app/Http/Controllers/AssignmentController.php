<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Teacher;

class AssignmentController extends Controller
{
    public function index(){
        $assignments = Assignment::all();
        $classes = Classes::all();
        $courses = Course::all();
        $grades = Grade::all();
        return view('backend.assignment.view', compact('assignments', 'classes', 'courses', 'grades'));
    }

    public function create(){
        $classes = Classes::all();
        $courses = Course::all();
        $grades = Grade::all();
        return view('backend.assignment.create', compact('classes', 'courses', 'grades'));
    }

    public function store(Request $request){
      
        $video = time().'.'.$request->video->getClientOriginalExtension();  
        $request->video->move(public_path('assignment/video/'), $video);
        $video_file = 'assignment/video/'.$video;

        $attach = time().'.'.$request->attach->getClientOriginalExtension();  
        $request->attach->move(public_path('assignment/txt/'), $attach);
        $attach_file = 'assignment/txt/'.$attach;

        $options = new Assignment([
            'name' => $request->get('name'),
            'attach' => $attach_file,
            'video' => $video_file,
            'grade_id' => $request->get('grade_id'),
            'classes_id' => $request->get('classes_id'),
            'course_id' => $request->get('course_id'),
        ]);
        $options->save();

        return redirect('/assignment/list');
       
    }

    public function update(Request $request){
        $options = Assignment::find($request->get('id'));
        
        if($request->video !='undefined'){
            unlink($options['video']);
            $video = time().'.'.$request->video->getClientOriginalExtension();  
            $request->video->move(public_path('assignment/video/'), $video);
            $video_file = 'assignment/video/'.$video;
            $options->video = $video_file;
        }  
        
        if($request->attach !='undefined'){
            unlink($options['attach']);
            $attach = time().'.'.$request->attach->getClientOriginalExtension();  
            $request->attach->move(public_path('assignment/txt/'), $attach);
            $attach_file = 'assignment/txt/'.$attach;
            $options->attach = $attach_file;
        }  

        $options->name = $request->get('name');
        $options->grade_id = $request->get('grade_id');
        $options->classes_id = $request->get('classes_id');
        $options->course_id = $request->get('course_id');
        $options->save();
        return response()->json('success');
    }

    public function delete($id){
        $options = Assignment::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        unlink($options['video']);
        unlink($options['attach']);
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }

    public function teacher_index(){       
        $assignments = Assignment::Where('teacher_id', session('teacherId'))->get();
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $classes = Classes::where('teacher_id', $teacher->id)->get();
        $classe_grades = Classes::where('teacher_id', $teacher->id)->pluck('grade_id');       
        $grades = Grade::whereIn('id', $classe_grades)->get();
        $courses = Course::all();
        return view('backend.assignment.teacherView', compact('assignments', 'classes', 'courses', 'grades'));
    }

    public function teacher_create(){
        $teacher = Teacher::find(session('teacherId'));
        $teacher_id = $teacher->id;
        $classes = Classes::where('teacher_id', $teacher->id)->get();
        $classe_grades = Classes::where('teacher_id', $teacher->id)->pluck('grade_id');       
        $grades = Grade::whereIn('id', $classe_grades)->get();
        $courses = Course::all();
        
        return view('backend.assignment.teacherCreate', compact('classes', 'courses', 'grades'));

    }

    public function teacher_store(Request $request){
        $video = time().'.'.$request->video->getClientOriginalExtension();  
        $request->video->move(public_path('assignment/video/'), $video);
        $video_file = 'assignment/video/'.$video;

        $attach = time().'.'.$request->attach->getClientOriginalExtension();  
        $request->attach->move(public_path('assignment/txt/'), $attach);
        $attach_file = 'assignment/txt/'.$attach;

        $options = new Assignment([
            'name' => $request->get('name'),
            'attach' => $attach_file,
            'video' => $video_file,
            'grade_id' => $request->get('grade_id'),
            'classes_id' => $request->get('classes_id'),
            'course_id' => $request->get('course_id'),
            'teacher_id' => session('teacherId'),
        ]);
        $options->save();

        return redirect('/teacherAssign/list');
    }

    public function teacher_update(Request $request){
        $options = Assignment::find($request->get('id'));
        
        if($request->video !='undefined'){
            unlink($options['video']);
            $video = time().'.'.$request->video->getClientOriginalExtension();  
            $request->video->move(public_path('assignment/video/'), $video);
            $video_file = 'assignment/video/'.$video;
            $options->video = $video_file;
        }  
        
        if($request->attach !='undefined'){
            unlink($options['attach']);
            $attach = time().'.'.$request->attach->getClientOriginalExtension();  
            $request->attach->move(public_path('assignment/txt/'), $attach);
            $attach_file = 'assignment/txt/'.$attach;
            $options->attach = $attach_file;
        }  

        $options->name = $request->get('name');
        $options->grade_id = $request->get('grade_id');
        $options->classes_id = $request->get('classes_id');
        $options->course_id = $request->get('course_id');
        $options->save();
        return response()->json('success');
    }

    public function teacher_delete($id){
        $options = Assignment::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        unlink($options['video']);
        unlink($options['attach']);
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }
}
