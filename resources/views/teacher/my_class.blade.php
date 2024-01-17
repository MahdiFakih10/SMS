@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Classes</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">My Classes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>My Class Timetable (Today)</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $record)
                                        @if ($getTeacher->qualification == $record->subject_name)
                                        <tr>
                                            <td>{{ $record->class_name }}</td>
                                            <td>{{ $record->subject_name }}</td>
                                            <td>
                                                @php
                                                    $ClassSubject = $record->getMyTimeTable($record->class_id, $record->subject_id); 
                                                @endphp
                                                @if (!empty($ClassSubject))
                                                    {{ date('h:i A', strtotime($ClassSubject->start_time)) }} to {{date('h:i A', strtotime($ClassSubject->end_time))}} 
                                                    <br>
                                                    Room Number: {{ $ClassSubject->room_number }}
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-y H:i A', strtotime($record->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('teacher/my_class/class_timetable/' .$record->class_id.'/'.$record->subject_id) }}" class="btn btn-primary">My Class Timetable</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                              
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
