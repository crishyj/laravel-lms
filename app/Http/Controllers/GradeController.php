<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
    }

    public function index(){
        $options = Grade::all();
        return view('backend.grade.index', compact('options'));
    }

    public function create(){
        return view('backend.grade.create');
    }

    public function store(Request $request){ 

        // $validate_array = array(
        //     'first_name'=>'required',
        //     'last_name'=>'required',            
        //     'birthday'=>'required',
        //     'address' => 'required',
        //     'position'=>'required',
        //     'subject'=>'required',
        //     'phone'=>'required',             
        //     'profile_image' => 'required|max:2048',
        // );
        // $request->validate($validate_array); 

        
        $grade = Grade::all();
        if (Grade::where('name', '=', $request->get('name'))->exists()) {
            echo "
                <script>
                    alert('Grade already exist!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options = new Grade([
                'name' => $request->get('name'),              
            ]);
            $options->save();
            return redirect('/grade/list');
        }
    }

    
    public function update(Request $request){
        // $validate_array = array(
        //     'first_name'=>'required',
        //     'last_name'=>'required',            
        //     'birthday' => 'required',
        //     'address'=>'required',
        //     'phone'=>'required',             
        // );

        // $request->validate($validate_array); 
        
        $options = Grade::find($request->get('id'));
        $options->name = $request->get('name');
        $options->save();
        return response()->json('success');
    }

    public function delete($id){
        $options = Grade::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }       
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }
}
