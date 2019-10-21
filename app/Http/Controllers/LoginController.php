<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function showStudentLogin(){
        return view('student.login');
    }
    public function showAdminLogin(){
        return view('admin.login');
    }
    public function showUniversityLogin(){
        return view('university.login');
    }

    public function processAdminLogin(Request $request){

       $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('admin.dashboard'));

        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }


    public function processUniversityLogin(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        if (auth('university')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('university.dashboard'));

        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }

    public function processStudentLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        if (auth('student')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('index'));

        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }



    public function adminLogout(Request $request){
        auth('admin')->logout();
        $request->session()->invalidate();
        return redirect(route('admin.signin.show'));
    }
    public function universityLogout(Request $request){
        auth('university')->logout();
        $request->session()->invalidate();
        return redirect(route('university.signin.show'));
    }
    public function studentLogout(Request $request){
        auth('student')->logout();
        $request->session()->invalidate();
        return redirect()->intended(route('student.signin.show'));
    }
}
