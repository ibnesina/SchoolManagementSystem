@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Collect Fees</h1>
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
                      <label>Class</label>
                      <select class="form-control" name="class_id">
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                            <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Roll</label>
                        <input type="text" class="form-control" value="{{Request::get('roll_number')}}" name="roll_number" placeholder="Roll">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Student Name</label>
                        <input type="text" class="form-control" value="{{Request::get('full_name')}}" name="full_name" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" style="margin-top: 32px;" type="submit">Search</button>
                      <a href="{{url('admin/fees_collection/collect_fees')}}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
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
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Roll</th>
                      <th>Student Name</th>
                      <th>Class Name</th>
                      <th>Total Fees</th>
                      <th>Paid amount</th>
                      <th>Remaining amount</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!empty($getRecord))
                        @foreach ($getRecord as $value)
                        @php
                            $paid_amount = $value->getPaidAmount($value->id, $value->class_id);
                            $remainingAmount = $value->amount - $paid_amount;
                        @endphp
                            <tr>
                                <td>{{$value->roll_number}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->class_name}}</td>
                                <td>${{number_format($value->amount, 2)}}</td>
                                <td>${{number_format($paid_amount, 2)}}</td>
                                <td>${{number_format($remainingAmount, 2)}}</td>
                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('admin/fees_collection/collect_fees/add_fees/'.$value->id) }}" class="btn btn-success">Collect Fees</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%">Record Not Found</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                    @if(!empty($getRecord))
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    @endif
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