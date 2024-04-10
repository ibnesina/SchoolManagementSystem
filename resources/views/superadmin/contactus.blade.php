@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">

            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Contact Messages</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Message</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->message}}</td>
                          <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection