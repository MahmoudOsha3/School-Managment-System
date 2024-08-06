@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.list_attendance') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.list_attendance') }} - {{ $section->grade->name }} - {{ $section->classroom->name }} - {{ $section->name }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_attendance') }}</li>
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

                    <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('student.date_day') }} : {{ date('Y-m-d') }}</h5>

                    <br><br>
                    <form action="{{ route('attendance.store') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('student.student') }}</th>
                                        <th>{{ trans('site.grade') }}</th>
                                        <th>{{ trans('site.classroom') }}</th>
                                        <th>{{ trans('site.section') }}</th>
                                        <th>{{ trans('site.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->grade->name}}</td>
                                            <td>{{ $student->classroom->name}}</td>
                                            <td>{{ $student->section->name}}</td>
                                            <td>
                                                {{-- لو الشخض اتحضر قبل كد يقفل الحضور و الغياب بتاعه --}}
                                                @if (isset($student->attendance()->where('date_attednace', date('Y-m-d'))->first()->student_id))
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendences[{{ $student->id }}]" disabled
                                                            {{ $student->attendance()->where('date_attednace', date('Y-m-d'))->first()->attednace_status == 1 ? 'checked' : '' }}
                                                            class="leading-tight" type="radio" value="presence">
                                                        <span class="text-success">{{ trans('student.attend') }}</span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendences[{{ $student->id }}]" disabled
                                                            {{ $student->attendance()->where('date_attednace', date('Y-m-d'))->first()->attednace_status == 0 ? 'checked' : '' }}
                                                            class="leading-tight" type="radio" value="absent">
                                                        <span class="text-danger">{{ trans('student.absent') }}</span>
                                                    </label>
                                                @else
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                            value="{{ true }}">
                                                        <span class="text-success">{{ trans('student.attend') }}</span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                            value="{{ false }}">
                                                        <span class="text-danger">{{ trans('student.absent') }}</span>
                                                    </label>
                                                @endif
                                            </td>

                                            <input type="hidden" value="{{ $student->grade->id }}" name="grade_id">
                                            <input type="hidden" value="{{ $student->classroom->id }}" name="classroom_id">
                                            <input type="hidden" value="{{ $student->section->id }}" name="section_id">
                                            <input type="hidden" value="{{ 1 }}" name="teacher_id">
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>
                                <button class="btn btn-success" type="submit">{{ trans('site.submit') }}</button>
                            </p>
                        </div>
                    </form>
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
@endsection
