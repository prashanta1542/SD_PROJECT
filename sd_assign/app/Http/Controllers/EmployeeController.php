<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
class EmployeeController extends Controller

{
    //
    public function home(){
        return view('welcome');
    }
    public function loginview(){
        return view('login');
    }
    public function loginuser(Request $r){
        $email=$r->email;
        $pass=md5($r->password);
        $role=$r->role;
        $e=Employee::where('email','=',$email)
                   ->where('pass','=',$pass)->first();
        if(!($e)){
            return redirect()->back()->with('notfound',"Credential not found");
        }
        if( ($e->verified) == 0){
            return redirect()->back()->with('verifyerror',"Please verify your email with provided OTP");
        }
        if( ($e->status) == 0){
            return redirect()->back()->with('approveerror',"You are not approved yet");
        }
        if($e->role == 'Super Admin'){
            Session::put('name',$e->name);
            Session::put('role',$e->role);
            return redirect('admin/dashboard');
        }
        if($e->role == 'Department Admin'){
            Session::put('name',$e->name);
            Session::put('role',$e->role);
            return redirect('department/dashboard');
        }
        if($e->role == 'teacher'){
            Session::put('name',$e->name);
            Session::put('role',$e->role);
            return redirect('teacher/dashboard');
        }
    }

    public function registerview(){
        $d=Department::all();
        return view('register',compact('d'));
    }
    public function registerstore(Request $r){
        $err=[];
        
        if(($r->password) != ($r->cpassword)){
            $err['pass'] = 'Password Mismatch';
        }
        if (!($r->email) || !($r->contact) || !($r->name) || !($r->address)) {
            $err['nullvalue'] = 'Please fill in every field.';
        }

        if(count($err)>0){
           return redirect()->back()->withErrors($err);
        }
        $email=Employee::where('email','=',$r->email)->first();
        if($email){
            return redirect()->back()->with('emailexiterror',"This email already register");
        }
        

        $e=new Employee();
        $otp=rand(100000,999999);
        $e->role='teacher';
        $e->name=$r->name;
        $e->address=$r->address;
        $e->email=$r->email;
        $e->contact=$r->contact;
        $e->department=$r->department;
        $e->pass=md5($r->password);
        $e->otp=$otp;
        $e->verified=false;
        
        if($e->save()){
            $data=['name'=>$r->name,'otp'=>$otp];
            $user['to']=$r->email;
            Mail::send('otp',$data,function($msg) use ($user){
                $msg->to($user['to']);
                $msg->subject('Confirm Verification');
            });
            return redirect()->back()->with('success',"Your Registration is successfull.Check your mail for Verification Code");
        }else{
            dd($e->error());
            return redirect()->back()->with("fail",'Registraion Failed.Please try again');
        }
        
        
    }

    public function otpview(){
        return view('verifyotp');
    }
    public function otpverify(Request $r){
        $otp=$r->otp;
        $e=Employee::where('otp','=',$otp)->first();
        if($e){
            $e->verified=true;
            $e->save();
            return redirect('login');
        }else{
            return redirect()->back()->with('otpinvalid','Your otp does not match');
        }
       
        
    }
}
