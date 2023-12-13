@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/subject/add') }}" class="btn text-white" style="background-color: #6610f2">Add New Subject</a>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Subject</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Request::get('name') }}" placeholder="Enter name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="type">Select Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="">Select Type</option>
                                                <option {{ (Request::get('type') == 'Science') ? 'selected' : '' }} value="Science">Science</option>
                                                <option {{ (Request::get('type') == 'Literature') ? 'selected' : '' }} value="Literature">Literature</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ Request::get('date') }}" placeholder="Enter date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn text-white"
                                                style="margin-top: 30px; background-color: #6610f2">Search</button>
                                            <a href="{{ url('admin/subject/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Subject list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecords as $record)
                                            <tr>
                                                <td>{{ $record->id }}</td>
                                                <td>{{ $record->name }}</td>
                                                <td>{{ $record->type }}</td>
                                                <td>
                                                    @if ($record->status == 0)
                                                        active
                                                    @else
                                                        inactive
                                                    @endif
                                                </td>
                                                <td>{{ $record->created_by }}</td>
                                                <td>{{ $record->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subject/edit/' . $record->id) }}"
                                                        class="btn text-white" style="background-color: #6610f2">Edit</a>
                                                    <a href="{{ url('admin/subject/delete/' . $record->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

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
