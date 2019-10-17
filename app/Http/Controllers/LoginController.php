<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showStudentLogin(){
        return view('student_login');
    }
}
