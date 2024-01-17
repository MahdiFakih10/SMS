@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Attendance</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search My Attendance</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="form-group col-md-2">
                                        <label for="">Date</label>
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
                                        <a href="{{ url('student/my_attendance') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Attendance</h3>
                        </div>
                        <div class="card-body p-0" style="overflow: auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Attendance</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($value->attendance_date))}}</td>
                                        <td>
                                           @if ($value->attendance_type == 1)
                                               Present
                                           @elseif ($value->attendance_type == 2)
                                               Late
                                           @elseif ($value->attendance_type == 3)
                                               Absent
                                           @endif
                                        </td>
                                        <td>{{ date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                                    </tr>
                                        
                                    @empty
                                        <tr>
                                            <td colspan="100%">Record not found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            @if (!empty($getRecord))
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection