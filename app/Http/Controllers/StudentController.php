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
   
    public function Apply()
    {
        
        return view ('backend.user.applyscholarship');
    }

    public function applying(Request $request)
    {
       
        $data = $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Phone_number' => 'required',
            'Address' => 'required',
            'School_Name' => 'required',
   
        ]);
        auth()->user()->student()->create($data);




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
