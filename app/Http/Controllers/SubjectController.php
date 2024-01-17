<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list(){
        $data['getRecords'] = SubjectModel::getRecords(); 
        $data['header_title'] = 'Subject List';
        return view('admin.subject.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add new List';
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request){
        $subject = new SubjectModel();
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = trim($request->status);
        $subject->is_deleted = 0;
        $subject->created_by = Auth::user()->id;
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject added successfully.');
    }

    public function edit($id){
        $data['getRecords'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecords'])) {
            $data['header_title'] = 'Edit Subject';
            return view('admin.subject.edit', $data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request){
        $subject = SubjectModel::getSingle($id);
        $subject->name = trim($request->name);
        $subject->type = trim($request->type);
        $subject->status = $request->status;
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject updated successfully');
    }

    public function delete($id){
        $subject = SubjectModel::getSingle($id);
        $subject->is_deleted = 1;
        $subject->save();

        return redirect('admin/subject/list')->with('success', 'Subject deleted successfully.');
    }

    public function MySubject(){
        $data['getRecords'] = ClassSubjectModel::MySubject(Auth::user()->class_id); 
        $data['header_title'] = 'My Subject';
        return view('student.my_subject', $data);
    }
}
