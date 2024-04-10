@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assigned Class to Teacher List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/assign_class_teacher/add')}}" class="btn btn-primary">Add Class to Teacher</a>
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
                <h3 class="card-title"><b>Search Class & Subject</b></h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Class Name</label>
                      <input type="text" class="form-control" value="{{Request::get('class_name')}}" name="class_name" placeholder="Class Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Subject Name</label>
                      <input type="text" class="form-control" value="{{Request::get('subject_name')}}" name="subject_name" placeholder="Teacher Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Teacher Name</label>
                      <input type="text" class="form-control" value="{{Request::get('teacher_name')}}" name="teacher_name" placeholder="Teacher Name">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" style="margin-top: 32px;" type="submit">Search</button>
                      <a href="{{url('admin/assign_class_teacher/list')}}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Assigned Class to Teacher</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Teacher Name</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($getRecord as $value)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$value->teacher_name}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->subject_name}}</td>
                        <td>
                          @if($value->status==0 )
                            Active
                          @else
                            Inactive
                          @endif
                        </td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                          <a href="{{url('admin/assign_class_teacher/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                          <a href="{{url('admin/assign_class_teacher/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach 
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection