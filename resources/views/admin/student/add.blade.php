@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
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
                                            <label>Admission Number <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="admission_number"
                                                placeholder="Admission Number" value="{{ old('admission_number') }}">
                                            <div style="color: red;">{{ $errors->first('admission_number') }}</div>
                                        </div>
                               
                                        <div class="form-group col-md-6">
                                            <label>Roll Number <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="roll_number"
                                                placeholder="Roll Number" value="{{ old('roll_number') }}">
                                            <div style="color: red;">{{ $errors->first('roll_number') }}</div>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class <span style="color: red">*</span></label>
                                            <select class="form-control" required name="class_id">
                                                <option value="">Select Class</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ (old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red;">{{ $errors->first('class_id') }}</div>
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
                                            <label>Religion<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="religion" 
                                                value="{{ old('religion') }}" placeholder="Religion">
                                            <div style="color: red;">{{ $errors->first('religion') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="mobile_number" 
                                                value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                            <div style="color: red;">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admission Date <span style="color: red">*</span></label>
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
                                            <label>Blood Group<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="blood_group" 
                                                value="{{ old('blood_group') }}" placeholder="Blood Group">
                                            <div style="color: red;">{{ $errors->first('blood_group') }}</div>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Height<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="height" 
                                                value="{{ old('height') }}" placeholder="Height">
                                            <div style="color: red;">{{ $errors->first('height') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" required name="weight" 
                                                value="{{ old('weight') }}" placeholder="Weight">
                                            <div style="color: red;">{{ $errors->first('weight') }}</div>
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

