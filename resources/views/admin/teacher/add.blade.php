@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Teacher</h1>
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
                                            <input type="text" class="form-control" required name="name"
                                                placeholder="Fisrt Name" value="{{ old('name') }}">
                                            <div style="color: red;">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="last_name"
                                                placeholder="Last Name" value="{{ old('last_name') }}">
                                            <div style="color: red;">{{ $errors->first('last_name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red">*</span></label>
                                            <select name="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                                <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                                            </select>
                                            <div style="color: red;">{{ $errors->first('gender') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" required name="date_of_birth" 
                                                value="{{ old('date_of_birth') }}">
                                            <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="mobile_number" 
                                                value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                            <div style="color: red;">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of joining<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" required name="admission_date" 
                                                value="{{ old('admission_date') }}">
                                            <div style="color: red;">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture</label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color: red;">{{ $errors->first('profile_pic') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marital Status <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="marital_status"
                                                placeholder="Marital Status" value="{{ old('marital_status') }}">
                                            <div style="color: red;">{{ $errors->first('marital_status') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Current Address <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="current_address"
                                                placeholder="Current Address" value="{{ old('current_address') }}">
                                            <div style="color: red;">{{ $errors->first('current_address') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status <span style="color: red">*</span></label>
                                            <select name="status" class="form-control" required>
                                                <option value="">Select Status</option>
                                                <option {{ (old('status') == '0') ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ (old('status') == '1') ? 'selected' : '' }} value="1">Inactive</option>
                                            </select>
                                            <div style="color: red;">{{ $errors->first('status') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Subject <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="qualification"
                                                placeholder="Subject" value="{{ old('qualification') }}">
                                            <div style="color: red;">{{ $errors->first('qualification') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Work Experience <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="work_experience"
                                                placeholder="Work Experience" value="{{ old('work_experience') }}">
                                            <div style="color: red;">{{ $errors->first('work_experience') }}</div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="form-group">
                                        <label>Email address <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" required name="email"
                                            placeholder="Enter email" value="{{ old('email') }}">
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
                                <button type="submit" class="btn text-white" style="background-color: #6610f2">Submit</button>
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

