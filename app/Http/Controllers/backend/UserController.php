<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function UpdateUser(request $request,$id)
    {
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

    public function Scholarship()
    {
        return view ('backend.user.scholarship');
    }
    public function AddScholarship()
    {
        return view ('backend.user.Addscholarship');
    }
    public function profile()
    {
        $id = Auth::user()->id;
        $userdata = User::find($id);
        return view ('backend.user.profile', compact('userdata'));
    }

    public function Updateprofile(Request $request)
    {
        $id = Auth::user()->id;
        $datas = array();
        $datas = User::find($id);
     
        $datas['name'] = $request->name;
        $datas['email'] = $request->email;

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

        return view ('backend.layouts.dashboard', compact('students', 'admin','users'));
    }
    public function Apply()
    {
        
        return view ('backend.user.applyscholarship');
    }
}
