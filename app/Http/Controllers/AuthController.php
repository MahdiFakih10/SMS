<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        //dd(Hash::make(123456));
        if(!empty(Auth::check())){
            if(Auth::user() -> user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user() -> user_type == 2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user() -> user_type == 3){
                return redirect('student/dashboard');
            }
        }
        return view('auth.login2');
    }

    public function AuthLogin(Request $request){
        
        //dd($request->all());
        $remember = !(empty($request->remember))? true : false;
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password], $remember)){

            if(Auth::user() -> user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user() -> user_type == 2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user() -> user_type == 3){
                return redirect('student/dashboard');
            }
        }
        else{
            return redirect()->back()->with('error', 'Please enter current email and password');
        }
    }

    public function forgotPassword(){
        return view('auth.forgot');
    }

    public function postForgotPassword(Request $request){
        $user = User::getEmailSingle($request->email);
        //dd($user);
        
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            
            return redirect()->back()->with('success', 'Please check your email and reset your password');
        }
        else{
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function postReset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            if(!empty($user))
            {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->save();
            }
            return redirect(url(''))->with('success', 'Password reset successfully.');
        }
        else
        {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }

    
}
