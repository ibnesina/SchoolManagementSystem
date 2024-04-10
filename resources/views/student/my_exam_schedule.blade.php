@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Schedule</h1>
          </div>
          {{-- <div class="col-sm-6" style="text-align:right;">
            <a href="{{url('admin/class_timetable/add')}}" class="btn btn-primary">Add Class Timetable</a>
          </div> --}}
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
                @foreach ($getRecord as $value)
                
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title"><b>{{$value['name']}}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <th>Subject Name</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                                <th>Full Marks</th>
                                <th>Pass Marks</th>
                            </thead>
                            <tbody>
                                @foreach ($value['exam'] as $valueS)
                                   <tr>
                                    <td>{{$valueS['subject_name']}}</td>
                                    <td>{{date('d-m-Y', strtotime($valueS['exam_date']))}}</td>
                                    <td>{{date('h:i A', strtotime($valueS['start_time']))}}</td>
                                    <td>{{date('h:i A', strtotime($valueS['end_time']))}}</td>
                                    <td>{{$valueS['room_number']}}</td>
                                    <td>{{$valueS['full_marks']}}</td>
                                    <td>{{$valueS['pass_mark']}}</td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div style="padding: 10px; float:right;">
                            
                        </div>
        
                        </div>
                    </div>
                @endforeach
                
                

          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection

