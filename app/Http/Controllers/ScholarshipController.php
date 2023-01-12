<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Scholarship;
use App\Models\student_scholarship;
use App\Models\Student;
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


        

        $alls =  Scholarship::get();
  
        return view ('backend.user.scholarship', compact( 'alls'     )); 

    }
    public function AddScholarship()
    {
        return view ('backend.user.Addscholarship');
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
          
            'image' => ['required','image'],
        ]);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['address'] = $request->address;
        $data['grade'] = $request->grade;
        $data['Parent_Income'] = $request->Parent_Income;
        if ($request->file('image')){
            $file = $request->file('image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/image'),$filename);
            $data['image'] = $filename;
        }
      
     Auth()->user()->Scholarship()->create($data);




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
          
            'image' => 'image',
        ]);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i;s');
        $data['updated_at'] = date('Y-m-d H:i;s');
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
