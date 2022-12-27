<?php

namespace App\Http\Controllers;
use App\Models\student_scholarship;
use App\Models\User;
use App\Models\Scholarship;
use App\Models\Student;
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
        
  
        
    
        $data['scholarship_id'] = $request->id;
       
        Auth()->user()->student()->create($data);
       
   




        $sana_all= DB::table('students')
        ->get();
        return redirect()->route('Scholarship')->with(compact('sana_all'));
        
    }

    public function Applicants(Scholarship $tudent, $id)
    {   
        $ikawna = Student::where('scholarship_id', '=', $id)->get();
        	
    
        return view ('backend.user.Applicants', compact('ikawna'));
        
        
    }

}
