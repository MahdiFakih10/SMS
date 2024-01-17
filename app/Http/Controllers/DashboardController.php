<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\AssignClassTeacherModel;

class DashboardController extends Controller
{
    public function dashboard(){

        $data['header_title'] = 'Dashboard';

        if(Auth::user() -> user_type == 1){
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalTeacher'] = User::getTotalUser(2);
            $data['TotalStudent'] = User::getTotalUser(3);
            $data['TotalClass'] = ClassModel::getTotalClass();
            $data['TotalSubject'] = SubjectModel::getTotalSubject();
            return view('admin/dashboard', $data);
        }
        else if(Auth::user() -> user_type == 2){
            $data['TotalStudent'] = User::getTeacherStudentCount(Auth::user()->id);
            $data['TotalClass'] = AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);
            //$data['TotalSubject'] = AssignClassTeacherModel::getMyClassCount(Auth::user()->id);
            $data['TotalSubject'] = 1;
            return view('teacher/dashboard', $data);
        }
        else if(Auth::user() -> user_type == 3){
            $data['getStudent'] = User::getClassStudentCount(Auth::user()->class_id);
            $data['getClass'] = User::getStudentClass(Auth::user()->id);
            $data['TotalSubject'] = ClassSubjectModel::MySubjectTotal(Auth::user()->class_id);
            return view('student/dashboard', $data);
        }
    }
}
