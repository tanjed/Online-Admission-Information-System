<?php

namespace App\Http\Controllers;

use App\Department;
use App\Notice;
use App\Program;
use App\University;
use App\Waiver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UniversityUseController extends Controller
{
    public function manageDash(){
        $university = auth('university')->user();
        $all_departments = Department::with('programs')->where('university_id',auth('university')->user()->id)->get();
        $departments = Department::where('university_id',auth('university')->user()->id)->paginate(3);
        $notices = Notice::where('university_id',$university->id)->get();
        return view('university.dashboard',compact('departments','all_departments', 'university','notices'));
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
            'cost' => 'required',
            'total_semester'=> 'required',
            'semester_duration' => 'required'
        ]);
        try{
            Program::create(['name' => $request->coursename,'department_id' => $request->department, 'credit' =>$request->credit, 'cost'=> $request->cost,'total_semester' => $request->total_semester,'semester_duration' => $request->semester_duration]);
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

    public function deleteSection($section,$id){
        if ($section == 'department'){
            Department::destroy($id);
            Program::where('department_id',$id)->delete();
        }
        if ($section == 'program'){
            Program::destroy($id);
        }
        if ($section == 'notice'){
            Notice::destroy($id);
        }
    }
    public function uploadCover(Request $request){
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

       try{
           $imageName = time().'.'.request()->image->getClientOriginalExtension();

           $request->image->move(public_path('img'), $imageName);

           $university = University::find(auth('university')->user()->id);
           $university->image_path = 'img/'.$imageName;
           $university->save();

           return back()->with('success','You have successfully upload image.');


       }catch (\Exception $e){
           return back()->with('error','Image Upload Failed');
       }

    }

    public function createNotice(Request $request){
        try{
            Notice::create([
                'university_id' => auth('university')->user()->id,
                'notice_title' => $request->notice_title,
                'notice_body' => $request->notice_body,
                'date' => Carbon::today()
            ]);
            return redirect(route('university.dashboard'));
        }catch (\Exception $e){
            return back()->withErrors(['msg' => 'Notice Create Failed!']);
        }
    }


}
