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
            <div class="card card-primary">
              {{-- <div class="card-header">
                <h3 class="card-title">Add New Admin</h3>
              </div> --}}
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Full Name <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}" name="name" required placeholder="Name">
                      <div style="color:red;">{{$errors->first('name')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Mobile Number<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('mobile_number', $getRecord->mobile_number)}}" name="mobile_number" required placeholder="Mobile Number">
                      <div style="color:red;">{{$errors->first('mobile_number')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Qualification<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('qualification', $getRecord->qualification)}}" name="qualification" required placeholder="Qualification">
                      <div style="color:red;">{{$errors->first('qualification')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Gender<span style="color:red;">*</span></label>
                        <select class="form-control" name="gender">
                          <option value="">Select Gender</option>
                          <option {{old('gender', $getRecord->gender) == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                          <option {{old('gender', $getRecord->gender) == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                          <option {{old('gender', $getRecord->gender) == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                        </select>
                        <div style="color:red;">{{$errors->first('gender')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Marital Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="marital_status">
                          <option value="">Select Gender</option>
                          <option {{old('marital_status', $getRecord->marital_status) == 'Married' ? 'selected' : ''}} value="Married">Married</option>
                          <option {{old('marital_status', $getRecord->marital_status) == 'Unmarried' ? 'selected' : ''}} value="Unmarried">Unmarried</option>
                        </select>
                        <div style="color:red;">{{$errors->first('marital_status')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Date of Birth<span style="color:red;">*</span></label>
                      <input type="date" class="form-control" value="{{old('date_of_birth', $getRecord->date_of_birth)}}" name="date_of_birth" required placeholder="Date of Birth">
                      <div style="color:red;">{{$errors->first('date_of_birth')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Religion<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('religion', $getRecord->religion)}}" name="religion" required placeholder="Religion">
                      <div style="color:red;">{{$errors->first('religion')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Blood Group</label>
                      <input type="text" class="form-control" value="{{old('blood_group', $getRecord->blood_group)}}" name="blood_group" placeholder="Blood Group">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Current Address<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('current_address', $getRecord->current_address)}}" required name="current_address" placeholder="Current Address">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Permanent Address</label>
                      <input type="text" class="form-control" value="{{old('permanent_address', $getRecord->permanent_address)}}" name="permanent_address" placeholder="Permanent Address">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Status<span style="color:red;">*</span></label>
                      <select class="form-control" name="status">
                          <option {{old('status', $getRecord->status) == 0 ? 'selected' : ''}} value="0">Active</option>
                          <option {{old('status', $getRecord->status) == 1 ? 'selected' : ''}} value="1">Inactive</option>
                      </select>
                      <div style="color:red;">{{$errors->first('status')}}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Profile Picture</label>
                      <input type="file" class="form-control" value="{{old('profile_pic', $getRecord->profile_pic)}}" name="profile_pic" placeholder="Profile Picture">
                      @if (!empty($getRecord->getProfile()))
                          <img src="{{$getRecord->getProfile()}}" style="width: 100px;" alt="">
                      @endif
                    </div>
                  </div>
                  <hr />
                    <div class="form-group">
                      <label>Email<span style="color:red;">*</span></label>
                      <input type="email" class="form-control" value="{{old('email', $getRecord->email)}}" name="email" required placeholder="Email">
                      <div style="color:red;">{{$errors->first('email')}}</div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection