<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Scholarship;
use App\Models\student_scholarship;
use Illuminate\Support\Facades\Auth;
class ScholarshipController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function Scholarship()
    {   
        $id = Auth::user()->id;
        $userdata = User::find($id);
       $user = DB::table('users')
       ->get();
        $alls = DB::table('scholarships')
        ->get();
        $ikawna = DB::table('students')
        ->get();
        return view ('backend.user.scholarship', ['user' => $user, 'alls' =>  $alls , 'ikawna' => $ikawna , 'userid' => $userdata]);
        
        
    }
    public function AddScholarship()
    {
        return view ('backend.user.Addscholarship');
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required','image'],
        ]);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
       
        if ($request->file('image')){
            $file = $request->file('image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/image'),$filename);
            $data['image'] = $filename;
        }
      
        $insert = DB::table('scholarships')->insert($data);




        $alls = DB::table('scholarships')
        ->get();
        return redirect()->route('Scholarship')->with(compact('alls'));
        
    }
    public function editscholarship($id)
    {
        $edit_scholar = DB::table('scholarships')->where('id',$id)->first();
        return view('backend.user.edit_scholarship', compact('edit_scholar'));
    }

    public function UpdateScholarship(request $request, $id)
    {   
    
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
       
        if ($request->file('image')){
            $file = $request->file('image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/image'),$filename);
            $data['image'] = $filename;
        }
      
        $update = DB::table('scholarships')
        ->where('id', $id)
        ->update($data);
        if($update)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Inserted',
            'alert-type'=>'success'

           );
           return redirect()->route('Scholarship')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('Scholarship')->with($notifications);
        }
    }

    public function Deletescholarship($id)
    {
        $delete = DB::table('scholarships')->where('id',$id)->delete();
        if($delete)
        {
           $notifications = array
           (
            'messege'=>'Successfully User Deleted',
            'alert-type'=>'info'

           );
           return redirect()->route('Scholarship')->with($notifications);

        }
        else
        {
            $notifications = array
           (
            'messege'=>'Something is wrong,please try again',
            'alert-type'=>'error'

           );
           return redirect()->route('Scholarship')->with($notifications);
        }
    }
}
