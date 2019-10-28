<?php

namespace App\Http\Controllers;

use App\Notice;
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
        $university_notices = Notice::where('university_id',$id)->paginate(3);
       return view('system.university_description',compact('university','university_notices'));
    }
     public function showNotice($id){
        $notice = Notice::find($id);
        return view('system.notice',compact('notice'));
     }

}
