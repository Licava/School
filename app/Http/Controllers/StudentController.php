<?php

namespace App\Http\Controllers;
use App\Models\student_scholarship;
use App\Models\User;
use App\Models\Scholarship;
use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function Apply($id)
    {
        $data = DB::table('scholarships')->where('id',$id)->first();
        return view ('backend.user.applyscholarship',  compact('data'));
    }

    public function applying(Request $request, $id)
    {
       
        $data = $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Phone_number' => 'required',
            'Address' => 'required',
            'School_Name' => 'required',
   
        ]);
        
  
        
        $data['First_Name'] = $request->First_Name;
        $data['Last_Name'] = $request->Last_Name;
        $data['Phone_number'] = $request->Phone_number;
        $data['Address'] = $request->Address;
        $data['user_id'] =  auth()->id();
        $data['scholarship_id'] = $request->id;
        $data['created_at'] = date('Y-m-d H:i;s');
        $data['updated_at'] = date('Y-m-d H:i;s');
        
        $insert = DB::table('students')->insert($data);
   




        $sana_all= DB::table('students')
        ->get();
        return redirect()->route('Scholarship')->with(compact('sana_all'));
        
    }

    public function Applicants()
    {   
        $ikawna = DB::table('students')->get();
    
        return view ('backend.user.Applicants', compact('ikawna'));
        
        
    }

}
