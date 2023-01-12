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
            'grade' => 'required',
            'Parent_Income' => 'required',
        ]);
        
  
        
        $data['scholarship_id'] = $request->id;
    
       
        Auth()->user()->student()->create($data);
       
   




        $sana_all= DB::table('students')
        ->get();
        return redirect()->route('Scholarship')->with(compact('sana_all'));
        
    }

    public function Applicants(Student $tudent, $id)
    {   
        $userdata = Scholarship::find($id);
       
        if( ($tudent->grade !=  $userdata?->grade) )
        {
          
       
            $ikawna = Student::where([
                ['grade', '=',$userdata->grade],
                ['Scholarship_id', '=', $id],
              
            ])
            ->get();
           

        } 
        elseif(($tudent->Address !=  $userdata?->address))
        {
        
            $ikawna = Student::where([
             
                ['Address', '=', $userdata->address],
                ['Scholarship_id', '=', $id],
             
            ])
            ->get();
        }     
        elseif(($tudent->Parent_Income !=  $userdata?->Parent_Income))
        {
        
            $ikawna = Student::where([
             
                ['Parent_Income', '=', $userdata->Parent_Income],
                ['Scholarship_id', '=', $id],
             
            ])
            ->get();
        }            
        elseif(($tudent->grade  !=  $userdata?->grade) && ($tudent->Address != $userdata?->address) )
        {
        
            $ikawna = Student::where([
                ['Scholarship_id', '=', $id],
                ['Address', '=', $userdata->address],
                ['grade', '=',$userdata->grade],
            ])
            ->get();
        }          
              
        else
        {
           
            $ikawna = Student::where([  ['Scholarship_id', '=', $id], ])->get();
        }
      
        return view ('backend.user.Applicants', compact('ikawna'));
        
        
    }

}
