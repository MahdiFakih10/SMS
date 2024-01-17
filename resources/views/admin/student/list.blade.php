@extends('layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (total: {{ $getRecord->count() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/student/add') }}" class="btn text-white" style="background-color: #6610f2">Add new Student</a>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Search Student</h3>
              </div>
              <form method="get" action="">
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group col-md-3">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" value="{{ Request::get('name')}}" placeholder="Enter Name">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Last Name</label>
                              <input type="text" name="last_name" class="form-control" value="{{ Request::get('last_name')}}" placeholder="Enter Last Name">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" value="{{ Request::get('email')}}" placeholder="Enter email">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Admission Number</label>
                              <input type="text" name="admission_number" class="form-control" value="{{ Request::get('admission_number')}}" placeholder="Enter Admission Number">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Role Number</label>
                              <input type="text" name="roll_number" class="form-control" value="{{ Request::get('roll_number')}}" placeholder="Enter Roll Number">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Class</label>
                              <input type="text" name="class" class="form-control" value="{{ Request::get('class')}}" placeholder="Enter Class">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Gender</label>
                              <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option {{ Request::get('gender') == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ Request::get('gender') == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                                <option {{ Request::get('gender') == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                              </select>
                          </div>
                          
                          <div class="form-group col-md-3">
                              <label for="">Mobile Number</label>
                              <input type="text" name="mobile_number" class="form-control" value="{{ Request::get('mobile_number')}}" placeholder="Enter Mobile Number">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Admission Date</label>
                              <input type="date" name="admission_date" class="form-control" value="{{ Request::get('admission_date')}}">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Blood Group</label>
                              <input type="text" name="blood_group" class="form-control" value="{{ Request::get('blood_group')}}" placeholder="Enter Blood Group">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Height</label>
                              <input type="text" name="height" class="form-control" value="{{ Request::get('height')}}" placeholder="Enter Height">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Weight</label>
                              <input type="text" name="weight" class="form-control" value="{{ Request::get('weight')}}" placeholder="Enter Weight">
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Status</label>
                              <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option {{ Request::get('status') == '100' ? 'selected' : '' }} value="100">Active</option>
                                <option {{ Request::get('status') == '1' ? 'selected' : '' }} value="1">Inactive</option>
                              </select>
                          </div>
                          <div class="form-group col-md-3">
                              <label for="">Created Date</label>
                              <input type="date" name="date" class="form-control" value="{{ Request::get('date')}}">
                          </div>
                          <div class="form-group col-md-3">
                              <button type="submit" class="btn text-white" style="margin-top: 30px; background-color: #6610f2;">Search</button>
                              <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                          </div>
                      </div>
                  </div>
              </form>
            </div>

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
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of birth</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
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
                        <td>{{ $record->roll_number }}</td>
                        <td>{{ $record->class_name }}</td>
                        <td>{{ $record->gender }}</td>
                        <td>
                          @if(!empty($record->date_of_birth))
                            {{ date('d-m-y', strtotime($record->date_of_birth))}}
                          @endif  
                        </td>
                        <td>{{ $record->mobile_number }}</td>
                        <td>
                          @if(!empty($record->admission_date))
                            {{ date('d-m-y', strtotime($record->admission_date))}}
                          @endif  
                        </td>
                        <td>{{ $record->blood_group }}</td>
                        <td>{{ $record->height }}</td>
                        <td>{{ $record->weight }}</td>
                        <td>{{ ($record->status == 0) ? 'Active' : 'Inactive'}}</td>
                        <td>{{ date('d-m-y h:i A', strtotime($record->created_at)) }}</td>
                        <td style="min-width: 200px">
                            <a href="{{ url('admin/student/edit/' . $record->id) }}"
                                class="btn text-white" style="background-color: #6610f2">Edit</a>
                            <a href="{{ url('admin/student/delete/' . $record->id) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
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