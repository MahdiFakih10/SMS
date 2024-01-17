@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
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
                        @include('_message')
                        <!-- general form elements -->
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                           <div class="card card-primary">
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Fisrt Name" value="{{ $getRecord->name }}">
                                            <div style="color: red;">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name" value="{{ $getRecord->last_name }}">
                                            <div style="color: red;">{{ $errors->first('last_name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option {{ ($getRecord->gender  == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                                <option {{ ($getRecord->gender  == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                                <option {{ ($getRecord->gender  == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                                            </select>
                                            <div style="color: red;">{{ $errors->first('gender') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" 
                                                value="{{$getRecord->date_of_birth}}">
                                            <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Religion</label>
                                            <input type="text" class="form-control" name="religion" 
                                                value="{{$getRecord->religion}}" placeholder="Religion">
                                            <div style="color: red;">{{ $errors->first('religion') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number" 
                                                value="{{ $getRecord->mobile_number }}" placeholder="Mobile Number">
                                            <div style="color: red;">{{ $errors->first('mobile_number') }}</div>
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
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control" name="blood_group" 
                                                value="{{ $getRecord->blood_group }}" placeholder="Blood Group">
                                            <div style="color: red;">{{ $errors->first('blood_group') }}</div>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Height</label>
                                            <input type="text" class="form-control" name="height" 
                                                value="{{ $getRecord->height }}" placeholder="Height">
                                            <div style="color: red;">{{ $errors->first('height') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" name="weight" 
                                                value="{{ $getRecord->weight }}" placeholder="Weight">
                                            <div style="color: red;">{{ $errors->first('weight') }}</div>
                                        </div>
                                    </div>
                                    
                                    <hr/>

                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email" value="{{ $getRecord->email }}">
                                        <div style="color: red;">{{ $errors->first('email') }}</div>
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

