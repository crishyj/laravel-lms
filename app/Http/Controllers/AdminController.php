<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct() {
        if(!Session::get('director')){
            return redirect()->route('logout');
        }
     }

    public function index(){
        $options = Admin::all();
        return view('backend.admin.index', compact('options'));
    }

    public function create(){
        return view('backend.admin.create');
    }

    public function store(Request $request){
        $validate_array = array(
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'birthday'=>'required',
            'address' => 'required',
            'position'=>'required',
            'phone'=>'required',             
            'profile_image' => 'required|max:2048',
        );
        $request->validate($validate_array); 

        $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
        $request->profile_image->move(public_path('profile/admin/'), $fileName);
        $upload_file = 'profile/admin/'.$fileName;

        $admin = Admin::all();
        if (Admin::where('email', '=', $request->get('email'))->exists()) {
            echo "
                <script>
                    alert('Administrator already exist!');
                    window.history.back(-1);
                </script>";
        }
        else{
            $options = new Admin([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'middle_name' => $request->get('middle_name'),
                'email'=> $request->get('email'),
                'birthday' => $request->get('birthday'),
                'address' => $request->get('address'),
                'position' => $request->get('position'),
                'phone' => $request->get('phone'),
                'profile_image' => $upload_file,
            ]);
            $options->save();
            return redirect('/admin/list');
        }
    }

    public function delete($id){
        $options = Admin::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        unlink($options['profile_image']);
        $options->delete();        
        return back()->with('success', 'Deleted Successfully');
    }

    public function update(Request $request){
        $validate_array = array(
            'first_name'=>'required',
            'last_name'=>'required', 
            'email' => 'required',
            'birthday' => 'required',
            'address'=>'required',
            'phone'=>'required',             
        );

        $request->validate($validate_array); 
        
        $options = Admin::find($request->get('id'));
        
        if($request->profile_image !='undefined'){
            unlink($options['profile_image']);
            $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();  
            $request->profile_image->move(public_path('profile/admin/'), $fileName);
            $upload_file = 'profile/admin/'.$fileName;
            $options->profile_image = $upload_file;
        }   
       
        $options->first_name = $request->get('first_name');
        $options->last_name = $request->get('last_name');
        $options->middle_name = $request->get('middle_name');
        $options->email = $request->get('email');
        $options->birthday = $request->get('birthday');
        $options->address = $request->get('address');
        $options->phone = $request->get('phone');
        $options->save();
        return response()->json('success');
    }


    public function access_list(){
        $admins = Admin::where('password', '!=', '')->get();      
        return view('backend.admin.accessView', compact('admins'));
    }

    public function access_create(){
        $admins = Admin::whereNull('password')->get();
        return view('backend.admin.accessAdd', compact('admins'));
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
            $options = Admin::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return redirect('/adminAccess/list');
        }
    }

    public function access_update(Request $request){
        if ($request->get('password') != $request->get('confirm_password')) {
            return response()->json('The given data was invalid.');
        }
        else{
            $options = Admin::find($request->get('id'));
            $password = md5($request->get('password'));
            $options->password = $password;         
            $options->save();
            return response()->json('success');
        }
    }

    public function access_delete($id){
        $options = Admin::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }
        $options->password = null;
        $options->save();        
        return redirect('/adminAccess/list');
    }
}
