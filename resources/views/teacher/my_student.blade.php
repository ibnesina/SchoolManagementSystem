@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List</h1>
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
                <h3 class="card-title"><b>Search Student</b></h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{Request::get('name')}}" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Email</label>
                      <input type="text" class="form-control" value="{{Request::get('email')}}" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Class</label>
                        <input type="text" class="form-control" value="{{Request::get('class_name')}}" name="class_name" placeholder="Class">
                      </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" style="margin-top: 32px;" type="submit">Search</button>
                      <a href="{{url('teacher/my_student')}}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Student List</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th>#</th> --}}
                      <th>Profile Picture</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                          {{-- <td>{{$value->id}}</td> --}}
                          <td>
                              <img src="{{asset('../upload/profile/')}}/{{$value->profile_pic}}" style="height: 50px; width: 50px;" alt="">
                          </td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->admission_number}}</td>
                          <td>{{$value->roll_number}}</td>
                          <td>{{$value->class_name}}</td>
                          <td>{{$value->gender}}</td>
                          <td>{{$value->date_of_birth}}</td>
                          <td>{{$value->religion}}</td>
                          <td>{{$value->mobile_number}}</td>
                          <td>{{$value->admission_date}}</td>
                          <td>{{$value->blood_group}}</td>
                          <td>{{$value->height}}</td>
                          <td>{{$value->weight}}</td>
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