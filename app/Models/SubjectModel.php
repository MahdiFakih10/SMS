<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';

    static public function getRecords(){
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', '=', 'subject.created_by');

                    if(!empty(Request::get('name'))){
                        $return = $return->where('subject.name', 'like', '%'.Request::get('name').'%');
                    }

                    if(!empty(Request::get('type'))){
                        $return = $return->where('subject.type', 'like', '%'.Request::get('type').'%');
                    }

                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('subject.created_at', '=', Request::get('date'));
                    }

                    $return = $return->where('subject.is_deleted', '=', '0')
                    ->orderBy('subject.id', 'desc')
                    ->paginate(10);

        return $return;
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getSubject(){
        $return = SubjectModel::select('subject.*')
        ->where('subject.is_deleted', '=', '0')
        ->where('subject.status', '=', '0')
        ->orderBy('subject.name', 'asc')
        ->get();

        return $return;
    }

    static public function getTotalSubject(){
        return SubjectModel::select('subject.*')
        ->where('subject.is_deleted', '=', '0')
        ->where('subject.status', '=', '0')
        ->count();
    }


}
