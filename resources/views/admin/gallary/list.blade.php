@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery Image List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/gallary/add')}}" class="btn btn-primary">Add New Image</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">

            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Gallery Image List</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th>#</th> --}}
                      <th>Gallery Image</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                          {{-- <td>{{$value->id}}</td> --}}
                          <td>
                              <img src="{{asset('../upload/gallary/')}}/{{$value->image}}" style="height: 90px; width: 150px;" alt="">
                          </td>
                          <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                          <td>
                            <a href="{{url('admin/gallary/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                  {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
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