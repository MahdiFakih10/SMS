<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClassController;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassModel;
use App\Models\AssignClassTeacherModel;
use Auth;

class AssignClassTeacherController extends Controller
{
    public function list(){
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = 'Assign Class Teacher';
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = 'Assign New Class Teacher';
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->teacher_id))
        {
            foreach ($request->teacher_id as $teacher_id)
            {
                $getAlreadyAssign = AssignClassTeacherModel::getAlreadyAssign($request->class_id, $teacher_id);

                if(!empty($getAlreadyAssign)){
                    $getAlreadyAssign->status = $request->status;
                    $getAlreadyAssign->save();
                }
                else{
                    $class = new AssignClassTeacherModel;
                    $class->class_id = $request->class_id;
                    $class->teacher_id = $teacher_id;
                    $class->status = $request->status;
                    $class->created_by = Auth::user()->id;
                    $class->save();
                }
            }
            return redirect('admin/assign_class_teacher/list')->with('success', 'Assign Class to Teacher successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Please try again.');
        }
    }

    public function edit($id){
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'Edit Assign Class Teacher';
            return view('admin.assign_class_teacher.edit', $data);
        }
        else{
            abort(404);
        }
    }
    
    public function update($id, Request $request){
        AssignClassTeacherModel::deleteSubject($request->class_id);

        if(!empty($request->teacher_id))
        {
            foreach($request->teacher_id as $teacher_id)
            {
                $getAlreadyAssign = AssignClassTeacherModel::getAlreadyAssign($request->class_id, $teacher_id);

                if(!empty($getAlreadyAssign))
                {
                    $getAlreadyAssign->status = $request->status;
                    $getAlreadyAssign->save();
                }
                else
                {
                    $class = new AssignClassTeacherModel();
                    $class->class_id = $request->class_id;
                    $class->teacher_id = $teacher_id;
                    $class->status = $request->status;
                    $class->created_by = Auth::user()->id;
                    $class->save();
                }
            }   
        }
        return redirect('admin/assign_class_teacher/list')->with('success', 'Assign clas to teacher successfully.');
    }

    public function delete($id){
        $user = AssignClassTeacherModel::getSingle($id);
        $user->is_deleted = 1;
        $user->save();

        return redirect('admin/assign_class_teacher/list')->with('success', 'Subject deleted successfully.');
    }

    //teacher side work
    public function MyClass(){
        $data['getRecord'] = AssignClassTeacherModel::getMyClass(Auth::user()->id);
        $data['getTeacher'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = 'My Class';
        return view('teacher.my_class', $data);
    }
}
