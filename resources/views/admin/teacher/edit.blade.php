@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Teacher</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                           <div class="card card-primary">
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Fisrt Name" value="{{ $getRecord->name }}">
                                            <div style="color: red;">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name" value="{{ $getRecord->last_name }}">
                                            <div style="color: red;">{{ $errors->first('last_name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red">*</span></label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option {{ ($getRecord->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option {{ ($getRecord->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                                <option {{ ($getRecord->gender == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                                            </select>
                                            <div style="color: red;">{{ $errors->first('gender') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="date_of_birth" 
                                                value="{{ $getRecord->date_of_birth }}">
                                            <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="mobile_number" 
                                                value="{{ $getRecord->mobile_number }}" placeholder="Mobile Number">
                                            <div style="color: red;">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of joining<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="admission_date" 
                                                value="{{ $getRecord->admission_date }}">
                                            <div style="color: red;">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture</label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color: red;">{{ $errors->first('profile_pic') }}</div>
                                            @if(!empty($getRecord->getProfile()))
                                                <img src="{{asset($getRecord->getProfile())}}" alt="Profile Picture" style="width: 100px;">
                                                <!-- <label for="">{{$getRecord->profile_pic}}</label> -->
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marital Status <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="marital_status"
                                                placeholder="Marital Status" value="{{ $getRecord->marital_status}}">
                                            <div style="color: red;">{{ $errors->first('marital_status') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Current Address <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="current_address"
                                                placeholder="Current Address" value="{{ $getRecord->current_address }}">
                                            <div style="color: red;">{{ $errors->first('current_address') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status <span style="color: red">*</span></label>
                                            <select name="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option {{ ($getRecord->status == '0') ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ ($getRecord->status == '1') ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                            <div style="color: red;">{{ $errors->first('status') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Subject <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="qualification"
                                                placeholder="Subject" value="{{ $getRecord->qualification }}">
                                            <div style="color: red;">{{ $errors->first('qualification') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Work Experience <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="work_experience"
                                                placeholder="Work Experience" value="{{ $getRecord->work_experience }}">
                                            <div style="color: red;">{{ $errors->first('work_experience') }}</div>
                                        </div>
                                    </div>
                                    
                                    <hr/>

                                    <div class="form-group">
                                        <label>Email address <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email" value="{{ $getRecord->email }}">
                                        <div style="color: red;">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" required name="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn text-white" style="background-color: #6610f2">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

