@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.quizzes') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.quizzes') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.quizzes') }}</li>
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
                    <h3>{{ trans('student.student') }} : <span class="text-success">{{ $reports[0]->student->name }}</span></h3><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('student.quizze') }}</th>
                                    <th>{{ trans('student.subject') }}</th>
                                    <th>{{ trans('site.grade') }}</th>
                                    <th>{{ trans('site.classroom_id') }}</th>
                                    <th>{{ trans('site.section') }}</th>
                                    <th>{{ trans('site.total_score') }}</th>
                                    <th>{{ trans('site.score_student') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$report->quizze->title }}</td>
                                        <td>{{$report->quizze->subject->name }}</td>
                                        <td>{{$report->quizze->grade->name }}</td>
                                        <td>{{$report->quizze->classroom->name }}</td>
                                        <td>{{$report->quizze->section->name }}</td>
                                        <td>{{$report->score_quizze }}</td>
                                        <td>{{$report->score_student }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
