@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Classes & Subjects</h1>
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
                <h3 class="card-title"><b>My Classes & Subjects</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Class Timetable</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($getRecord as $value)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->subject_name}}</td>
                        <td>
                          @php
                              $classSubject = $value->getTimetable($value->class_id, $value->subject_id);
                          @endphp
                          @if (!empty($classSubject)) 
                              {{date('h:i A', strtotime($classSubject->start_time))}} to {{date('h:i A', strtotime($classSubject->end_time))}}
                              <br>
                              Room Number: {{$classSubject->room_number}}
                          @endif
                          
                        </td>
                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                          <a href="{{url('teacher/my_class_subject/class_timetable/'.$value->class_id.'/'.$value->subject_id)}}" class="btn btn-primary">Timetable</a>
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