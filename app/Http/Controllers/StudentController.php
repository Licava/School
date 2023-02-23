<?php

namespace App\Http\Controllers;
use App\Models\student_scholarship;
use App\Models\User;
use App\Models\Scholarship;
use App\Models\Student;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'name' => 'required',
            'Phone_Number' => 'required',
            'Address' => 'required',
            'Name_School' => 'required',
            'Grade' => 'required',
            'Age' => 'required',
            'Parent_Income' => 'required',
            'Relationship' => 'required',
            'GWA' => 'required',
         
        ]);
        

        $data['scholarship_id'] = $request->id;
    
       
        Auth()->user()->student()->create($data);
       
   




        $sana_all= DB::table('students')
        ->get();
        return redirect()->route('Scholarship')->with(compact('sana_all'));
        
    }

    public function Applicants(Student $tudent, $id)
    {   
        $wasted = Student::where([['Scholarship_id', $id],['Status', '=' , 'Approve']])->get();
        $userdata = Scholarship::find($id);
      
        if( ($tudent->grade !=  $userdata?->grade) )
        {
          
       
            $ikawna = Student::where([
                ['Grade', '=',$userdata->grade],
                ['Scholarship_id', '=', $id],
                ['Status', '=' , 'Pending'],
            ])
            ->get();
           

        } 
        elseif(($tudent->Address !=  $userdata?->address))
        {
        
            $ikawna = Student::where([
             
                ['Address', '=', $userdata->address],
                ['Scholarship_id', '=', $id],
                ['Status', '=' , 'Pending'],
             
            ])
            ->get();
        }     
        elseif(($tudent->Parent_Income !=  $userdata?->Parent_Income))
        {
        
            $ikawna = Student::where([
             
                ['Parent_Income', '=', $userdata->Parent_Income],
                ['Scholarship_id', '=', $id],
                ['Status', '=' , 'Pending'],
             
            ])
            ->get();
        }            
        elseif(($tudent->grade  !=  $userdata?->grade) && ($tudent->Address != $userdata?->address) )
        {
        
            $ikawna = Student::where([
                ['Scholarship_id', '=', $id],
                ['Address', '=', $userdata->address],
                ['Grade', '=',$userdata->grade],
                ['Status', '=' , 'Pending'],
            ])
            ->get();
        }          
              
        else
        {
           
            $ikawna = Student::where([  ['Scholarship_id', '=', $id],    ['Status', '=' , 'Pending'] ])->get();
        }
      


        if( ($tudent->grade !=  $userdata?->grade) )
        {
          
       
            $wase = Student::where([
                ['Grade', '!=',$userdata->grade],
                ['Scholarship_id', '=', $id],
                ['Status', '=', 'Pending'],
              
            ])
            ->get();
           

        } 
        elseif(($tudent->Address !=  $userdata?->address))
        {
        
            $wase = Student::where([
             
                ['Address', '!=', $userdata->address],
                ['Scholarship_id', '=', $id],
                ['Status', '=', 'Pending'],
            ])
            ->get();
        }     
        elseif(($tudent->Parent_Income !=  $userdata?->Parent_Income))
        {
        
            $wase = Student::where([
             
                ['Parent_Income', '!=', $userdata->Parent_Income],
                ['Scholarship_id', '=', $id],
                ['Status', '=', 'Pending'],
             
            ])
            ->get();
        }            
        elseif(($tudent->grade  !=  $userdata?->grade) && ($tudent->Address != $userdata?->address) )
        {
        
            $wase = Student::where([
                ['Scholarship_id', '=', $id],
                ['Address', '!=', $userdata->address],
                ['Grade', '!=',$userdata->grade],
                ['Status', '=', 'Pending'],
            ])
            ->get();
        }          
              
        else
        {
           
            $wase = Student::where([  ['Scholarship_id', '!=', $id],   ['Status', 'Pending']])->get();
        }
      
   
     

        return view ('backend.user.Applicants',  compact('ikawna', 'wase' , 'wasted'));
        
        
    }
    
    public function Approve($id)
    {
      
        $datas = array();
        $datas['Status'] = 'Approve';
        $datasd =  Student::where('id',$id)->update($datas);
        $notifications = array
        (
         'messege'=>'Successfully User Inserted',
         'alert-type'=>'success'

        );
        return redirect()->back()->with($notifications);
        
    }
    public function Disapprove($id)
    {
      
        $datas = array();
        $datas['Status'] = 'Pending';
        $datasd =  Student::where('id',$id)->update($datas);
        $notifications = array
        (
         'messege'=>'Successfully User Disapprove',
         'alert-type'=>'error'

        );
        return redirect()->back()->with($notifications);
        
    }

    public function Remove($id)
    {
        $deletes = Auth::user()->student->firstWhere('scholarship_id', $id)->delete();
        if ($deletes) {
            $notifications = array
            (
                'messege' => 'Successfully User Disapprove',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notifications);
        }
    }
}
