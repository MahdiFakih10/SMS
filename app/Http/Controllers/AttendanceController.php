<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAttendanceModel;
use App\Models\AssignClassTeacherModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function AttendanceStudent(Request $request){
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date'))){
            $data['getStudent'] = User::getStudentClassForAttendance($request->get('class_id')); 
        }

        $data['header_title'] = 'Attendance Student';
        return view('admin.attendance.student', $data); 
    }

    public function AttendanceStudentSubmit(Request $request){
        
        $check_attendance = StudentAttendanceModel::checkAlreadyAttendance($request->student_id, $request->class_id, $request->attendance_date);
        
        if(!empty($check_attendance)){
            $attendance = $check_attendance;    
        }
        else{
            $attendance = new StudentAttendanceModel();
            $attendance->student_id = $request->student_id;
            $attendance->class_id = $request->class_id;
            $attendance->attendance_date = date('Y-m-d', strtotime($request->attendance_date));
            $attendance->created_by = Auth::user()->id;
        }
        $attendance->attendance_type = $request->attendance_type;
        $attendance->save();
        $json['message'] = "Attendance saved successfully";
        echo json_encode($json);
    }
    
    public function AttendanceReport(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = StudentAttendanceModel::getRecord();
        $data['header_title'] = 'Attendance Report';
        return view('admin.attendance.report', $data);
    }

    //Teacher Side
    public function AttendanceStudentTeacher(Request $request){
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date'))){
            $data['getStudent'] = User::getStudentClassForAttendance($request->get('class_id')); 
        }

        $data['header_title'] = 'Attendance Student';
        return view( 'teacher.attendance.student', $data); 
    }

    public function AttendanceReportTeacher(Request $request){
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $classarray = array();
        foreach($getClass as $value){
            $classarray[] = $value->class_id;
        }
        $data['getClass'] = $getClass;
        $data['getRecord'] = StudentAttendanceModel::getRecordTeacher($classarray);
        $data['header_title'] = 'Attendance Report';
        return view('teacher.attendance.report', $data);
    }

    public function MyAttendance(){
        $data['getClass'] = StudentAttendanceModel::getRecordStudent(Auth::user()->id);
        $data['getRecord'] = StudentAttendanceModel::getRecordStudent(Auth::user()->id);
        $data['header_title'] = "My Attendance";
        return view('student.my_attendance', $data);
    }

}
