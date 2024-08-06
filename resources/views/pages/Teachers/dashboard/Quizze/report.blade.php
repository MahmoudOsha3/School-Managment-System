@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('site.report_quizze') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('site.report_quizze') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>{{ trans('site.report_quizze') }} : {{ $quizze->title }} , <span class="text-success"> {{ trans('site.total_score') }} : {{ $quizze->question->sum('score') }}</span></h3><br>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h6 class="text-success">{{ trans('site.count_student_done_quizze') }} : {{ $reports->count()}}</h6>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('student.student') }}</th>
                                            <th>{{ trans('site.grade') }}</th>
                                            <th>{{ trans('site.classroom') }}</th>
                                            <th>{{ trans('site.section') }}</th>
                                            <th>{{ trans('student.score') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reports as $report)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$report->student->name}}</td>
                                                <td>{{$report->student->grade->name}}</td>
                                                <td>{{ $report->student->classroom->name }}</td>
                                                <td>{{$report->student->section->name}}</td>
                                                <td class="text-success">{{$report->score_student}}</td>
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
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
