<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(){
       // $university = auth('university')->user();
        $data = [
            'name' => "Tanjed",
            'code' => "1111",
            'email' => "ahmed15-6849@diu.edu.bd"
        ];
       try{
           \Mail::send('email_template',$data,function ($message) use ($data) {
               $message->to( "ahmed15-6849@diu.edu.bd",  "Tanjed")->subject('Account Verification');
           });
       }catch (\Exception $e){
           dd($e);
       }
    }
     public function showVerification(){
        return view('verify_email');
     }
     public function processVerification(Request $request){
        $id = auth('university')->user()->id;
        $university = University::findOrFail($id);
       if ($request->token == $university->email_verification_token){
           $university->email_verified = 1;
           $university->save();
           return redirect(route('university.dashboard'));
       }else{

           return back()->withErrors(["msg" => "Code Mismatched"]);
       }
     }
}
