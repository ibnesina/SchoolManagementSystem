@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Exam Result</h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

        @foreach ($getRecord as $value)
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>{{ $value['exam_name'] }}</b></h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Home Work</th>
                      <th>Class Test</th>
                      <th>Exam</th>
                      <th>Total</th>
                      <th>Full Marks</th>
                      <th>Result</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @php
                        $total_score = 0;
                        $total_full_marks = 0;
                        $result_validation = 0;
                    @endphp
                    @foreach ($value['subject'] as $exam)
                    @php
                        $total_score = $total_score + $exam['totalScore'];
                        $total_full_marks = $total_full_marks + $exam['full_marks'];
                    @endphp
                    <tr>
                        <td>{{ $exam['subject_name'] }}</td>
                        <td>{{ $exam['home_work'] }}</td>
                        <td>{{ $exam['class_test'] }}</td>
                        <td>{{ $exam['exam'] }}</td>
                        <td>{{ $exam['totalScore'] }}</td>
                        <td>{{ $exam['full_marks'] }}</td>

                        <td>
                            @if ($exam['totalScore'] >= $exam['pass_mark'])
                                <span style="color: green; font-weight:bold;">Pass</span>
                            @else
                                @php
                                    $result_validation = 1;
                                @endphp
                                <span style="color: red;">Fail</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">
                            <b>Grand Total: {{$total_score}} / {{$total_full_marks}}</b>
                        </td>
                        <td colspan="2">
                            <b>Percentage: {{ round(($total_score * 100) / $total_full_marks, 2) }} </b>
                        </td>
                        <td colspan="3">
                            <b>Result: 
                                @if($result_validation == 0) 
                                    <span style="color: green; font-weight:bold;">Passed</span>
                                @else
                                    <span style="color: red; font-weight:bold;">Failed</span>
                                @endif
                            </b>
                        </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection