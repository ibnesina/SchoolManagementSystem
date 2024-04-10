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
                <h3 class="card-title"><b>Dues List</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Total Fees</th>
                      <th>Paid amount</th>
                      <th>Remaining amount</th>
                      <th>Remarks</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $record)
                    <tr>
                        <td>{{ $record->total_amount }}</td>
                        <td>{{ $record->paid_amount }}</td>
                        <td>{{ $record->remaining_amount }}</td>
                        <td>{{ $record->remark }}</td>
                        <td>{{ $record->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                
                </table>

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