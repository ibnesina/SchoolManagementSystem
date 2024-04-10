@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Image</h1>
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
                    {{-- <div class="form-group col-md-6">
                      <label>Full Name <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Name">
                      <div style="color:red;">{{$errors->first('name')}}</div>
                    </div> --}}
                    <div class="form-group col-md-6">
                      <label>Gallary Image</label>
                      <input type="file" class="form-control" value="{{old('image')}}" name="image" placeholder="Gallary Image">
                    </div>
                  </div>
                  {{-- <hr /> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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