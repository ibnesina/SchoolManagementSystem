@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Assigned Teacher</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              {{-- <div class="card-header">
                <h3 class="card-title">Add New Admin</h3>
              </div> --}}
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Class Name</label>
                    <select class="form-control" name="class_id">
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                          <option value="{{$class->id}}"{{$getRecord->class_id == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subject Name</label>
                        @foreach ($getSubject as $subject)
                        @php
                          $checked = "";
                        @endphp
                        @foreach ($getAssignedSubjectId as $assignSubject)
                            @if ($assignSubject->subject_id==$subject->id)
                              @php
                                $checked = "checked";
                              @endphp
                            @endif  
                        @endforeach
                          <div>
                            <label style="font-weight: normal;">
                              <input {{$checked }} type="checkbox" value="{{$subject->id}}" name="subject_id[]">{{" ".$subject->name}}
                            </label>  
                          </div>
                          
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Teacher Name</label>
                        @foreach ($getTeacher as $teacher)
                        @php
                          $checked = "";
                        @endphp
                        @foreach ($getAssignedTeacher as $assignedTeacher)
                            @if ($assignedTeacher->teacher_id==$teacher->id)
                              @php
                                $checked = "checked";
                              @endphp
                            @endif  
                        @endforeach
                          <div>
                            <label style="font-weight: normal;">
                              <input {{$checked }} type="checkbox" value="{{$teacher->id}}" name="teacher_id[]">{{" ".$teacher->name}}
                            </label>  
                          </div>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option {{$getRecord->status == 0 ? 'selected' : ''}} value="0">Active</option>
                        <option {{$getRecord->status == 1 ? 'selected' : ''}} value="1">Inactive</option>
                    </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection