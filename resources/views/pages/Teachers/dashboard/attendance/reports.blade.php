@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.report_attendance') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.report_attendance') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.report_attendance') }}</li>
            </ol>
        </div>
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <div class="alert alert-danger">>
                            {{ $errors }}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <br>

                    <form method="post" action="{{ route('teacher.view.attendance.reports') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="inputState">{{trans('student.students')}}</label>
                                <select class="custom-select mr-sm-2" name="student_id" required>
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    <option value="0">{{ trans('student.all_student') }}</option>
                                    @foreach($list_all_student as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">{{trans('student.from_date')}}</label>
                                    <input class="form-control" value="{{ old('from_date') }}" type="date"  id="datepicker-action" name="from_date" data-date-format="yyyy-mm-dd"  required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="title">{{trans('student.from_date')}}</label>
                                    <input class="form-control" type="date" value="{{ old('to_date') }}"  id="datepicker-action" name="to_date" data-date-format="yyyy-mm-dd"  required>
                                </div>
                            </div>
                        </div>
                        {{-- ---------------------------------------- --}}
                        <div class="form-row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">{{trans('site.submit')}}</button>
                            </div>
                        </div>
                    </form>

                    @isset($attendance)
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('student.name') }}</th>
                                        <th>{{ trans('site.grade') }}</th>
                                        <th>{{ trans('site.classroom_id') }}</th>
                                        <th>{{ trans('site.section') }}</th>
                                        <th>{{ trans('site.date') }}</th>
                                        <th>{{ trans('site.status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1 ;
                                        $count_Attend = 0 ;
                                        $count_Absent = 0 ;
                                    @endphp
                                    @foreach ($attendance as $attend)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $attend->student->name }}</td>
                                            <td>{{$attend->grade->name }}</td>
                                            <td>{{$attend->classroom->name }}</td>
                                            <td>{{$attend->section->name}}</td>
                                            <td>{{$attend->date_attednace}}</td>
                                            @php $status = $attend->attednace_status == 1 ? trans('student.attend') : trans('student.absent') ; @endphp
                                            @php $colorStatus = $attend->attednace_status == 1 ? 'success' : 'danger' ; @endphp
                                            <td class="text-{{ $colorStatus }}">{{ $status }}</td>
                                            @php
                                                if ( $attend->attednace_status == 1)
                                                {
                                                    $count_Attend += 1 ;
                                                }else
                                                {
                                                    $count_Absent += 1 ;
                                                }
                                            @endphp

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                                <h5 class="text-success">{{ trans('student.total_attendance') }} : {{ $count_Attend }} </h5>
                                <h5 class="text-danger">{{ trans('student.total_absent') }}  : {{ $count_Absent }} </h5>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('js')
@toastr_js
@toastr_render

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('teacher/grade/students') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="student_id"]').empty();
                        $('select[name="student_id"]').append('<option value="" disabled selected>' +  "{{ trans('student.Choose') }}" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="student_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

@endsection
