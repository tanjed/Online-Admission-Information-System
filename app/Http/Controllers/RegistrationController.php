<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
   public function showStudentRegistration(){
       return view('student_registration');
   }
}
