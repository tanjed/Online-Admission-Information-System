<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminUniversity;
use App\Student;
use App\University;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
   public function showStudentRegistration(){
       return view('student.registration');
   }
    public function showAdminRegistration(){
        return view('admin.registration');
    }
    public function showUniversityRegistration(){
        return view('university.registration');
    }
    public function processAdminRegistration(Request $request){
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        try{
            $admin = Admin::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);

            auth('admin')->login($admin);
            return redirect()->to(route('admin.dashboard'));

        }catch (Exception $e){
            return back()->withErrors(['msg' => 'Something Went Wrong!']);
        }
    }
    public function  processUniversityRegistration(Request $request){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'status' => 'required',
        ]);

       $isAvailable = AdminUniversity::where('email',$request->email)->where('create_status',0)->first();
       if(!empty($isAvailable)){
          if($isAvailable->name != $request->name ){
              return back()->withErrors(['msg' => 'Information Mismatched']);
          }else{
              AdminUniversity::where('email',$request->email)->update(['create_status' => 1]);
              try{
                  $admin = University::create([
                      'name' => $request['name'],
                      'email' => $request['email'],
                      'password' => bcrypt($request['password']),
                      'status' => $request['status'],
                      'email_verification_token' => rand(10,10000)
                  ]);

                  auth('university')->login($admin);

                  AdminUniversity::where('email',$request->email)->update(['create_status'=> 1]);

                  return redirect()->to(route('university.dashboard'));

              }catch (Exception $e){
                  return back()->withErrors(['msg' => 'Something Went Wrong!']);
              }
          }
       }else{
           return back()->withErrors(['msg' => 'You are not allowed to Register']);
       }
    }

    public function processStudentRegistration(Request $request){
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        try{
            $admin = Student::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'email_verification_token' => rand(10,10000)
            ]);

            auth('student')->login($admin);
            return redirect()->intended(route('index'));

        }catch (Exception $e){
            return back()->withErrors(['msg' => 'Something Went Wrong!']);
        }
    }
}
