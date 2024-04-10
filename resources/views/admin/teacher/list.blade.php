@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List (Total : {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/teacher/add')}}" class="btn btn-primary">Add New Teacher</a>
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
                <h3 class="card-title"><b>Search Teacher</b></h3>
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
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" value="{{Request::get('date_of_birth')}}" name="date_of_birth" placeholder="Date of Birth">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" style="margin-top: 32px;" type="submit">Search</button>
                      <a href="{{url('admin/teacher/list')}}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Teacher List</b></h3>
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
                      <th>Qualification</th>
                      <th>Marital Status</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Blood Group</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th>Date of Joining</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
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
                          <td>{{$value->qualification}}</td>
                          <td>{{$value->marital_status}}</td>
                          <td>{{$value->gender}}</td>
                          <td>{{$value->date_of_birth}}</td>
                          <td>{{$value->religion}}</td>
                          <td>{{$value->mobile_number}}</td>
                          <td>{{$value->blood_group}}</td>
                          <td>{{$value->current_address}}</td>
                          <td>{{$value->permanent_address}}</td>
                          <td>{{($value->status==0) ? 'Active' : 'Inactive'}}</td>
                          <td>{{$value->date_of_joining}}</td>
                          <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                          <td>
                            <a href="{{url('admin/teacher/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/teacher/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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