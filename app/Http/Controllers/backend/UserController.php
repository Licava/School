<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostRequest;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function alluser()
    {
        $all = DB::table('users')
        ->get();
        return view('backend.user.all-user', compact('all'));    
    }

    public function AddUser()
    {
        return view ('backend.user.add-user');
    }

    public function InsertUser(Request $request)
    {
   
        $id = Auth::user()->id;
        $data = $request->validate([
            'email' => "required|email|unique:users,email,$id"
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i;s');
        $data['updated_at'] = date('Y-m-d H:i;s');
       
        $insert = DB::table('users')->insert($data);
        if($insert)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Inserted',
            'alert-type'=>'success'

           );
           return redirect()->route('alluser')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('alluser')->with($notifications);
        }
    }
    public function edituser($id)
    {
        $edit = DB::table('users')->where('id',$id)->first();
        return view('backend.user.edit_user', compact('edit'));
    }

    public function UpdateUser(request $request, $id)
    {
       
        $data = $request->validate([
            'email' => "required|email|unique:users,email,$id"
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = date('Y-m-d H:i;s');
        $data['updated_at'] = date('Y-m-d H:i;s');
       
        $update = DB::table('users')
        ->where('id', $id)
        ->update($data);
        if($update)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Inserted',
            'alert-type'=>'success'

           );
           return redirect()->route('alluser')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('alluser')->with($notifications);
        }
    }

  
  
  
    public function DeleteUser($id)
    {
        $delete = DB::table('users')->where('id',$id)->delete();
        if($delete)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Deleted',
            'alert-type'=>'info'

           );
           return redirect()->route('alluser')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('alluser')->with($notifications);
        }
    }

    
    public function profile()
    {
        $id = Auth::user()->id;
        $userdata = User::find($id);
        return view ('backend.user.profile', compact('userdata'));
    }

    public function Updateprofile( Request $request)
    {
         
      
        $id = Auth::user()->id;
        $datas = array();
        $datas = $request->validate([
            'email' => "required|email|unique:users,email,$id"
        ]); 
        $datas = User::findOrFail($id);
        $datas['name'] = $request->name;
        $datas['email'] = $request->email;
        if ($request->file('profile_image')){
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/profile_image'),$filename);
            $datas['profile_image'] = $filename;
        }
      
        $datas->save();
        if($datas)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Inserted',
            'alert-type'=>'success'

           );
           return redirect()->route('profile')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('profile')->with($notifications);
        }
    }
    public function dashboard()
    {
        $students =  User::where('role', 'Student')->count();
        $admin =  User::where('role', 'Admin')->count();
        $users =  User::count();
        $scholarshipss = Scholarship::count();  

        return view ('backend.layouts.dashboard', compact('students', 'admin','users', 'scholarshipss'));
    }
    public function Apply()
    {
        
        return view ('backend.user.applyscholarship');
    }
    public function Changepassword()
    {
        $id = Auth::user()->id;
        $userpassword = User::find($id);
        return view ('backend.user.changepassword', compact('userpassword'));
    }

    public function Updatepassword(request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $hashedpassword =Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedpassword)){
                $users = User::find(Auth::id());
                $users->password = bcrypt($request->newpassword);
                $users->save();
                $notifications = array
           (
            'messege'=>'Successfully Change Password    ',
            'alert-type'=>'success'

           );
           return redirect()->back()->with($notifications);
        }
        else
        {
            $notifications = array
           (
            'messege'=>'The old password did not match  ,please try again',
            'alert-type'=>'error'

           );
           return redirect()->back()->with($notifications);
        }
    }
}
