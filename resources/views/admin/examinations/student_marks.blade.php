@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Marks</h1>
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
                <h3 class="card-title"><b>Search Exams</b></h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="form-group col-md-3">
                      <label>Exam Name</label>
                      <select class="form-control" name="exam_id" required>
                        <option value="">Select</option>
                        @foreach ($getExam as $exam)
                            <option {{(Request::get('exam_id') == $exam->id) ? 'selected' : ''}} value="{{$exam->id}}">{{$exam->name}}</option>
                        @endforeach
                      </select> 
                    </div>
                    <div class="form-group col-md-3">
                        <label>Class</label>
                        <select class="form-control"  name="class_id" required>
                          <option value="">Select</option>
                          @foreach ($getClass as $class)
                            <option {{(Request::get('class_id') == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" style="margin-top: 32px;" type="submit">Search</button>
                      <a href="{{url('admin/examinations/marks_register')}}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')
            
            @if(!empty($getSubject) && !empty($getSubject->count()))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Marks Register</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ROLL NO.</th>
                      @foreach ($getSubject as $subject)
                        <th>
                            {{$subject->subject_name}} <br>
                            Full Marks: {{$subject->full_marks}}
                        </th>
                        
                      @endforeach
                      <th>Total Marks</th>
                    </tr>
                  </thead>
                  <tbody>
                        @if (!empty($getStudent) && !empty($getStudent->count()))
                            @foreach ($getStudent as $student)
                            <form name="post" class="SubmitForm">
                                {{csrf_field()}}
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                                <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
                                <tr>
                                    <td>{{$student->roll_number}}</td>
                                    @php
                                        $i = 1;
                                        $total = 0;
                                        $totalFullMark = 0;
                                    @endphp
                                    @foreach ($getSubject as $subject)
                                        @php
                                            $totalMark = 0;
                                            $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);
                                            if(!empty($getMark)) {
                                                $totalMark = $getMark->home_work + $getMark->class_test + $getMark->exam;
                                            }

                                            $total += $totalMark;
                                            $totalFullMark += $subject->full_marks;
                                        @endphp
                                        <td>
                                            {{-- <div style="margin-bottom: 10px;">
                                                Home Work
                                                <input type="hidden" name="mark[{{$i}}][full_marks]" value="{{$subject->full_marks}}">
                                                <input type="hidden" name="mark[{{$i}}][pass_mark]" value="{{$subject->pass_mark}}">

                                                <input type="hidden" name="mark[{{$i}}][subject_id]" value="{{$subject->subject_id}}">
                                                <input type="text" name="mark[{{$i}}][home_work]" style="width: 200px;" placeholder="Enter Marks" 
                                                value="{{!empty($getMark->home_work) ? $getMark->home_work : ''}}" class="form-control">
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                Class Test
                                                <input type="text" name="mark[{{$i}}][class_test]" style="width: 200px;" placeholder="Enter Marks"
                                                value="{{!empty($getMark->class_test) ? $getMark->class_test : ''}}" class="form-control">
                                            </div>
                                            <div style="margin-bottom: 10px;">
                                                Exam
                                                <input type="text" name="mark[{{$i++}}][exam]" style="width: 200px;" placeholder="Enter Marks"
                                                value="{{!empty($getMark->exam) ? $getMark->exam : ''}}" class="form-control">
                                            </div> --}}
                                            @if (!empty($getMark))
                                            <div style="margin-bottom: 10px;">
                                                {{$totalMark}}<br>
                                                {{-- @if ($totalMark >= $subject->pass_mark)
                                                    <span style="color: green; font-weight: bold;">Pass</span>
                                                @else
                                                    <span style="color: red; font-weight: bold;">Fail</span>
                                                @endif --}}
                                            </div>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td style="min-width: 150px;">
                                        {{-- <button type="submit" class="btn btn-success">Save</button> --}}
                                        @if (!empty($total)) 
                                            <b>{{$total}}</b>
                                            {{-- <br>
                                            out of {{$totalFullMark}} --}}
                                        @endif
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        @endif
                  </tbody>
                </table>
              </div>

            </div>

            @endif

            <td style="min-width: 150px;">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success" href="{{ route('generate_pdf', ['exam_id' => Request::get('exam_id'), 'class_id' => Request::get('class_id')]) }}">Save as PDF</a>
                </div>
            </td>
            
            
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

 @section('script')
     <script type="text/javascript">
        $('.SubmitForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/examinations/submit_marks_register') }}",
                data : $(this).serialize(),
                dataType : "json",
                success: function(data) {

                }
            });
        })
     </script>
 @endsection