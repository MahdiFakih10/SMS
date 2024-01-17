@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Picture</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of birth</th>
                      <th>Mobile Number</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>
                          @if(!empty($record->getProfile()))
                            <img src="{{ $record->getProfile() }}" alt="" style= "width: 50px; height: 50px; border-radius: 50px">
                          @endif
                        </td>
                        <td>{{ $record->name ." ". $record->last_name}}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->admission_number }}</td>
                        <td>{{ $record->class_name }}</td>
                        <td>{{ $record->gender }}</td>
                        <td>
                          @if(!empty($record->date_of_birth))
                            {{ date('d-m-y', strtotime($record->date_of_birth))}}
                          @endif  
                        </td>
                        <td>{{ $record->mobile_number }}</td>
                        <td>{{ date('d-m-y h:i A', strtotime($record->created_at)) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  </div>
                </table>
              </div>
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