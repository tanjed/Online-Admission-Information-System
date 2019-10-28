<?php

namespace App\Http\Controllers;

use App\Department;
use App\Program;
use App\University;
use Illuminate\Http\Request;

class SearchUseController extends Controller
{
    public function  showSearch(){
        return view('system.search');
    }
    public function searchResult(Request $request){
        $searchResult = Program::with('department.university')->where('name','like','%'.$request->search.'%')->where('cost','<=',$request->budget)->get();
        return view('system.search',compact('searchResult'));
    }
    public function compare(){
        return view('system.compare');
    }
    public function compareResult(Request $request){
        $universities = University::with('departments.programs')->where('name','like','%'.$request->name.'%')->get();
        return json_encode($universities);
    }
}
