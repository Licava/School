<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class ScholarshipController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Scholarship()
    {
        $alls = DB::table('scholarships')
        ->get();
        return view ('backend.user.scholarship', compact('alls'));
      
        
    }
    public function AddScholarship()
    {
        return view ('backend.user.Addscholarship');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required','image'],
        ]);

        $imagepath = request('image')->store('uploads', 'public');

        auth()->user()->Scholarship()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagepath,
        ]);
        $alls = DB::table('scholarships')
        ->get();
        return redirect()->back()->with(compact('alls'));
        
    }
}
