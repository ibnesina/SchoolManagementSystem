<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Marks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .custom-box {
            border: 1px solid #ccc; /* Border style */
            border-radius: 5px; /* Optional: Border radius for rounded corners */
            padding: 10px; /* Optional: Padding for inner content */
        }
    </style>
</head>

<body>
    @if (!empty($getSubject) && $getSubject->count() > 0)
        <form name="post" class="SubmitForm">
            {{ csrf_field() }}
            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

            <div class="card custom-box"> <!-- Apply custom-box class for border -->
                <div class="card-header">
                    <h3 class="card-title text-center"><b>{{$getExam->name}} - {{$getClass->name}}</b></h3>
                </div>
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-striped text-center custom-box"> <!-- Apply custom-box class for border -->
                        <thead>
                            <tr>
                                <th class="custom-box">Roll No.</th>
                                @foreach ($getSubject as $subject)
                                    <th class="custom-box"> <!-- Apply custom-box class for border -->
                                        {{ $subject->subject_name }} <br>
                                        {{-- Full Marks: {{ $subject->full_marks }} --}}
                                    </th>
                                @endforeach
                                <th class="custom-box">Total Marks</th> <!-- Apply custom-box class for border -->
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($getStudent) && $getStudent->count() > 0)
                                @foreach ($getStudent as $student)
                                    <tr>
                                        <td class="custom-box">{{ $student->roll_number }}</td> <!-- Apply custom-box class for border -->
                                        @php
                                            $i = 1;
                                            $total = 0;
                                            $totalFullMark = 0;
                                        @endphp
                                        @foreach ($getSubject as $subject)
                                            @php
                                                $totalMark = 0;
                                                $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);
                                                if (!empty($getMark)) {
                                                    $totalMark = $getMark->home_work + $getMark->class_test + $getMark->exam;
                                                }

                                                $total += $totalMark;
                                                $totalFullMark += $subject->full_marks;
                                            @endphp
                                            <td class="custom-box"> <!-- Apply custom-box class for border -->
                                                @if (!empty($getMark))
                                                    <div style="margin-bottom: 10px;">
                                                        {{ $totalMark }}<br>
                                                    </div>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="custom-box" style="min-width: 150px;"> <!-- Apply custom-box class for border -->
                                            @if (!empty($total))
                                                <b>{{ $total }}</b>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    @endif
</body>

</html>
