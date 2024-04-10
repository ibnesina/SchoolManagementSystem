@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Collect Fees <span style="color: blue;"><b>({{$getStudent->name}})</b></span></h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
            <button type="button" class="btn btn-primary" id="AddFees">Add Fees</button>
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
                <h3 class="card-title"><b>Payment Details</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Total Fees</th>
                        <th>Paid amount</th>
                        <th>Remaining amount</th>
                        <th>Remark</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($getFees as $value)
                            <tr>
                                <td>{{$value->class_name}}</td>
                                <td>{{$value->total_amount}}</td>
                                <td>{{$value->paid_amount}}</td>
                                <td>{{$value->remaining_amount}}</td>
                                <td>{{$value->remark}}</td>
                                <td>{{$value->created_name}}</td>
                                <td>{{date('d-m-Y', strtotime($value->class_name))}}</td>
                                <td>{{$value->created_at}}</td>
                            </tr>
                        @endforeach

                        {{-- @if (!empty($getFees))
                          <tr>
                            <td colspan="100%">Record Not Found</td>
                          </tr>
                        @endif --}}
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

 @endsection

 
 <div class="modal fade" id="AddFeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="" method="POST">
        {{csrf_field()}}
       <div class="modal-body">
        
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Class : {{$getStudent->class_name}}</label>
          </div>
            <div class="form-group">
             <label for="recipient-name" class="col-form-label">Total Amount : {{number_format($getStudent->amount, 2)}}</label>
           </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Paid Amount : {{number_format($paid_amount, 2)}}</label>
          </div>
          <div class="form-group">
            @php
                $remainingAmount = $getStudent->amount - $paid_amount;
            @endphp
            <label for="recipient-name" class="col-form-label">Remaining Amount : {{number_format($remainingAmount, 2)}}</label>
          </div>
           <div class="form-group">
             <label for="recipient-name" class="col-form-label">Amount</label>
             <input type="number" class="form-control" id="recipient-name" name="amount">
           </div>
           <div class="form-group">
             <label for="message-text" class="col-form-label">Remark </label>
             <textarea class="form-control" name="remark"></textarea>
           </div>
         </form>
       
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
       </div>
    </div>
     </div>
   </div>
 </div>

@section('script')
    <script type="text/javascript">
        $('#AddFees').click(function() {
            $('#AddFeesModal').modal('show');
        });
    </script>

@endsection