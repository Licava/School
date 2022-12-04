<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Scholarship;

use Illuminate\Support\Facades\Auth;
class student_scholarship extends Controller
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
        $data['First_Name'] = $request->First_Name;
        $data['Last_Name'] = $request->Last_Name;
        $data['Phone_number'] = $request->Phone_number;
        $data['Address'] = $request->Address;
        $data['School_Name'] = $request->School_Name;
       
       
        $insert = DB::table('student_scholarships')->insert($data);




        $sana_all= DB::table('student_scholarships')
        ->get();
        return redirect()->route('Scholarship')->with(compact('sana_all'));
        
    }
}
