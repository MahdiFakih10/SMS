@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Report (Total: {{ $getRecord->total() }})</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Attendance Report</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="form-group col-md-1">
                                        <label for="">Student ID</label>
                                        <input type="text" placeholder="Student ID" value="{{ Request::get('student_id') }}" class="form-control" name="student_id">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="">Student Name</label>
                                        <input type="text" placeholder="Student Name" value="{{ Request::get('student_name') }}" class="form-control" name="student_name">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="">Student Last Name</label>
                                        <input type="text" placeholder="Student Last Name" value="{{ Request::get('student_last_name') }}" class="form-control" name="student_last_name">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">Class</label>
                                        <select class="form-control" name="class_id">
                                            <option value="">Select</option>
                                            @foreach ($getClass as $class)
                                                <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="">Attendance Date</label>
                                        <input type="date" value="{{ Request::get('attendance_date') }}" class="form-control" name="attendance_date">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="">Attendance Type</label>
                                        <select name="attendance_type" class="form-control">
                                            <option value="">Select</option>
                                            <option {{ (Request::get('attendance_type') == 1) ? 'selected' : '' }} value="1">Present</option>
                                            <option {{ (Request::get('attendance_type') == 2) ? 'selected' : '' }} value="2">Late</option>
                                            <option {{ (Request::get('attendance_type') == 3) ? 'selected' : '' }} value="3">Absent</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary text-white" style="margin-top: 30px;background-color: #6610f2;">Search</button>
                                        <a href="{{ url('admin/attendance/report') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance List</h3>
                        </div>
                        <div class="card-body p-0" style="overflow: auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Class Name</th>
                                        <th>Attendance</th>
                                        <th>Attendance Date</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->student_id }}</td>
                                            <td>{{ $value->student_name }} {{ $value->student_last_name }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td> 
                                                @if ($value->attendance_type == 1)
                                                    Present
                                                @elseif ($value->attendance_type == 2)
                                                    Late
                                                @elseif ($value->attendance_type == 3)
                                                    Absent                                                    
                                                @endif 
                                            </td>
                                            <td>{{ date('d-m-y', strtotime($value->attendance_date))}}</td>
                                            <td>{{ $value->created_name }}</td>
                                            <td>{{ date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">Record Not Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection