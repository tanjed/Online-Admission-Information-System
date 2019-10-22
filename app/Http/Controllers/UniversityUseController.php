<?php

namespace App\Http\Controllers;

use App\Department;
use App\Program;
use App\University;
use App\Waiver;
use Illuminate\Http\Request;

class UniversityUseController extends Controller
{
    public function manageDash(){
        $all_departments = Department::with('programs')->where('university_id',auth('university')->user()->id)->get();
        $departments = Department::where('university_id',auth('university')->user()->id)->paginate(3);

        return view('university.dashboard',compact('departments','all_departments'));
    }
    public function createDept(Request $request){
        $this->validate($request,[
            'department' => 'required',
        ]);
        try{
            Department::create(['name' => $request->department,'university_id' => auth('university')->user()->id]);
            return redirect(route('university.dashboard'));
        }catch (Exception $e){
            return back()->withErrors(['msg' => 'Unable to Update']);
        }
    }
    public function createProgram(Request $request){
        $this->validate($request,[
            'coursename' => 'required',
            'credit' => 'required',
            'cost' => 'required'
        ]);
        try{
            Program::create(['name' => $request->coursename,'department_id' => $request->department, 'credit' =>$request->credit, 'cost'=> $request->cost]);
            return redirect(route('university.dashboard'));
        }catch (Exception $e){
            return back()->withErrors(['msg' => 'Unable to Update']);
        }
    }
    public  function updateInfo(Request $request){

        $this->validate($request,[
            'year' => 'required',
            'address' => 'required',
            'website' => 'required'
        ]);
       try{
           $university = University::find(auth('university')->user()->id);
           $university->established_year = $request->year;
           $university->address = $request->address;
           $university->phone = $request->phone;
           $university->website = $request->website;
           $university->save();
           return redirect(route('university.dashboard'));
       }catch (Exception $e){
           return back()->withErrors(['msg' => 'Unable to Update']);
       }
    }
    public function showProgram($id){
        $programs = Program::where('department_id',$id)->get();
       return  $programs;
    }
    public function addWaiver(Request $request){
       Waiver::updateOrCreate(
           ['program_id' =>$request->program_id, 'range' =>$request->range ],['percentage' => $request->percentage]
       );
       return redirect(route('university.dashboard'));
    }

}
