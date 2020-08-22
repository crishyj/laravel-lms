<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Grade;

class ClassesController extends Controller
{
    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
    }

    public function index(){
        $classes = Classes::all();
        $grades = Grade::all();
        return view('backend.classes.index', compact('classes', 'grades'));
    }

    public function create(){
        $options = Grade::all();
        return view('backend.classes.create', compact('options'));
    }

    public function store(Request $request){ 

        $validate_array = array(
            'grade_id'=>'required',
            'name'=>'required',                       
        );
        $request->validate($validate_array); 

        
        $classes = Classes::all();
        if (Classes::where('grade_id', '=', $request->get('grade_id'))->exists()) {
            $options = Classes::where('grade_id', '=', $request->get('grade_id'))->get();
            
            if ($options->where('name',  $request->get('name'))->count() === 0)
                {
                    $options = new Classes([
                        'grade_id' => $request->get('grade_id'),     
                        'name' => $request->get('name'),
                    ]);
                    $options->save();
                    return redirect('/classes/list');
                }
            else{

                echo "
                <script>
                    alert('Class already exist!');
                    window.history.back(-1);
                </script>";
            }         
        } 
        else{           
            $options = new Classes([
                'grade_id' => $request->get('grade_id'),     
                'name' => $request->get('name'),
            ]);
            $options->save();
            return redirect('/classes/list');
        }       
    }

    
    public function update(Request $request){
        // $validate_array = array(
        //     'grade_id'=>'required',
        //     'name'=>'required',            
        // );

        // $request->validate($validate_array); 
        
        $options = Classes::find($request->get('id'));
        if (Classes::where('grade_id', '=', $request->get('grade_id'))->exists()) {
            $requests = Classes::where('grade_id', '=', $request->get('grade_id'))->get();
            if ($requests->where('name',  $request->get('classes'))->count() === 0)
                {
                    $options->grade_id = $request->get('grade_id');
                    $options->name = $request->get('classes');
                    $options->save();
                    return response()->json('success');
                }
            else{
                return response()->json('The given data was invalid.');
            }         
        } 
        // $options->grade = $request->get('grade');
        // $options->classes = $request->get('classes');
        // $options->save();
        
    }

    public function delete($id){
        $options = Classes::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }       
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }
}
