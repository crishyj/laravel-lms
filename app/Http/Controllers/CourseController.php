<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
    }
    
    public function index(){
        $options = Course::all();
        return view('backend.course.index', compact('options'));
    }

    public function create(){
        $options = Course::all();
        return view('backend.course.create', compact('options'));
    }

    public function store(Request $request){ 
        
        $course = Course::all();
        if (Course::where('name', '=', $request->get('name'))->exists()) {
            echo "
            <script>
                alert('Course already exist!');
                window.history.back(-1);
            </script>";
        } 
        else{
            $options = new Course([
                'name' => $request->get('name'),              
            ]);
            $options->save();
            return redirect('/course/list');
        }       
    }

    
    public function update(Request $request){

        $options = Course::find($request->get('id'));
        if (Course::where('name', '=', $request->get('name'))->exists()) 
        {
            return response()->json('The given data was invalid.');
        }
        else{
            $options->name = $request->get('name');
            $options->save();
            return response()->json('success');
        } 
       
        
    }

    public function delete($id){
        $options = Course::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }       
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }
}
