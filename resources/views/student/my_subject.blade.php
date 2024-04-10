@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Subject</h1>
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
                <h3 class="card-title"><b>My Subjects</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @php
                    $i = 0;
                @endphp
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Subject Name</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$value->subject_name}}</td>
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