<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller{

    public function myAccount(){
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = 'My Account';
        if(Auth::user()->user_type == 1){
            return view('admin.my_account', $data);
        }
        if(Auth::user()->user_type == 2){
            return view('teacher.my_account', $data);
        }
        if(Auth::user()->user_type == 3){
            return view('student.my_account', $data);
        }
    }

    public function updateMyAccountAdmin(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully.');
    }
    public function updateMyAccountStudent(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->gender = trim($request->gender);
        $user->mobile_number = trim($request->mobile_number);
        if(!empty($request->date_of_birth)){
            $user->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic'))){
            if(!empty($user->getProfile())){
                unlink('upload/profile/'.$user->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext; 
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
        }
        $user->blood_group = trim($request->blood_group);
        $user->height = trim($request->height);
        $user->weight = trim($request->weight);
        $user->email = trim($request->email);
        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully.');


    }

    public function updateMyAccount(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50', 
        ]);
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->gender = trim($request->gender);
        $user->mobile_number = trim($request->mobile_number);
        $user->marital_status = trim($request->marital_status);
        $user->current_address = trim($request->current_address);

        if(!empty($request->date_of_birth)){
            $user->date_of_birth = trim($request->date_of_birth);
        }
    
        if(!empty($request->file('profile_pic'))){
            if(!empty($user->getProfile())){
                unlink('upload/profile/'.$user->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext; 
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
        }
        $user->qualification = trim($request->qualification);
        $user->work_experience = trim($request->work_experience);
        $user->email = trim($request->email);
        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    public function change_password(){
        $data['header_title'] = 'Change Password';
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request){
        // dd($request->all());
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Old password does not match.');
        }
    }
}
