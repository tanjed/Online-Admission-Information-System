<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class IndexUseController extends Controller
{
    public function showIndex(){
        return view('system.index');
    }
    public function showUniversityList($status){
        $universities = University::where('status',$status)->get();
        return view('system.university_list',compact('universities'));
    }
    public function showUniversityDetails($id){
        $university = University::with('departments.programs.waivers')->find($id);
       return view('system.university_description',compact('university'));
    }

}
