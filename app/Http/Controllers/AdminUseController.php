<?php

namespace App\Http\Controllers;

use App\AdminUniversity;
use App\Student;
use App\University;
use Illuminate\Http\Request;

class AdminUseController extends Controller
{
    public function manageDash(){
        $privateUniversities = count(University::where('status','private')->get());
        $publicUniversities = count(University::where('status','public')->get());
        $totalStudents = count(Student::all());
        $adminUniversities = AdminUniversity::paginate(10);
        return view('admin.dashboard',compact('adminUniversities','privateUniversities','publicUniversities','totalStudents'));
    }
    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        try{
            $admin = AdminUniversity::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'admin_id' => auth('admin')->user()->id,
            ]);
            return redirect()->to(route('admin.dashboard'));

        }catch (Exception $e){
            return back()->withErrors(['msg' => 'Something Went Wrong!']);
        }
    }
    public function delete($id){
         AdminUniversity::destroy($id);
         return redirect(route('admin.dashboard'));
    }
}
