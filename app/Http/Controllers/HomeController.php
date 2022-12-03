<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students =  User::where('role', 'Student')->count();
        $admin =  User::where('role', 'Admin')->count();
        $users =  User::count();
        $scholarshipss = Scholarship::count();  

        return view ('backend.layouts.dashboard', compact('students', 'admin','users', 'scholarshipss'));
    }
}
