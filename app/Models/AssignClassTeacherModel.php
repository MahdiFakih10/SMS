<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WeekModel;
use Request;
class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';

    static public function getRecord(){
        $return = self::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'teacher.last_name as teacher_last', 'teacher.qualification as teacher_qualification' , 'users.name as created_by_name')
                    ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('users', 'users.id', '=', 'assign_class_teacher.created_by');

                    if(!empty(Request::get('class_name'))){
                        $return = $return->where('class.name', 'like', '%'.Request::get('class_name').'%');
                    }
                    if(!empty(Request::get('teacher_name'))){
                        $return = $return->where('teacher.name', 'like', '%'.Request::get('teacher_name').'%');
                    }
                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('assign_class_teacher.created_at', '=', Request::get('date'));
                    }

        $return = $return->where('assign_class_teacher.is_deleted', '=', 0)
                         ->orderBy('assign_class_teacher.id', 'desc')
                         ->paginate(20);

        return $return;
    }
    static public function getMyClass($teacher_id){
        $return = self::select('assign_class_teacher.*', 'class.name as class_name', 'subject.name as subject_name', 'class.id as class_id' , 'subject.id as subject_id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
                    ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
                    ->where('assign_class_teacher.is_deleted', '=', 0)
                    ->where('assign_class_teacher.status', '=', 0)
                    ->where('subject.status', '=', 0)
                    ->where('subject.is_deleted', '=', 0)
                    ->where('class_subject.status', '=', 0)
                    ->where('class_subject.is_deleted', '=', 0)
                    ->where('assign_class_teacher.teacher_id', '=' , $teacher_id)
                    ->get();
        return $return;
    }

    static public function getMyClassCount($teacher_id){
        $return = self::select('assign_class_teacher.id')
                    ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                    ->join('class_subject', 'class_subject.class_id', '=', 'class.id')
                    ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
                    ->where('assign_class_teacher.is_deleted', '=', 0)
                    ->where('assign_class_teacher.status', '=', 0)
                    ->where('subject.status', '=', 0)
                    ->where('subject.is_deleted', '=', 0)
                    ->where('class_subject.status', '=', 0)
                    ->where('class_subject.is_deleted', '=', 0)
                    ->where('assign_class_teacher.teacher_id', '=' , $teacher_id)
                    ->count();
        return $return;
    }

    static public function getMyClassSubjectGroupCount($teacher_id){
        return self::select('assign_class_teacher.id')
                ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                ->where('assign_class_teacher.is_deleted', '=', 0)
                ->where('assign_class_teacher.status', '=', 0)
                ->where('assign_class_teacher.teacher_id', '=' , $teacher_id)
                ->count();
    }

    static public function getMyClassSubjectGroup($teacher_id){
        return self::select('assign_class_teacher.*', 'class.name as class_name', 'class.id as class_id')
                ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
                ->where('assign_class_teacher.is_deleted', '=', 0)
                ->where('assign_class_teacher.status', '=', 0)
                ->where('assign_class_teacher.teacher_id', '=' , $teacher_id)
                ->groupBy('assign_class_teacher.class_id')
                ->get();
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getAlreadyAssign($class_id, $teacher_id){
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=' , $teacher_id)->first();
    }

    static public function getAssignTeacherID($class_id){
        return self::where('class_id', '=' , $class_id)->where('is_deleted', '0')->get();
    }

    static public function deleteSubject($class_id){
        return self::where('class_id', '=' ,$class_id)->delete();
    }

    static public function getMyTimeTable($class_id, $subject_id){
        $getWeek = WeekModel::getWeekUsingName(date('l'));
        return $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
    }
}
