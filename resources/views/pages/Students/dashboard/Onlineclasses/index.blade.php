@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('student.online_classes') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('student.online_classes') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<h3>{{ trans('student.online_classes') }}</h3>

<!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('student.grade_class') }}</th>
                                            <th>{{ trans('student.classroom_class') }}</th>
                                            <th>{{ trans('site.section') }}</th>
                                            <th>{{ trans('site.subject') }}</th>
                                            <th>{{ trans('site.teacher') }}</th>
                                            <th>{{ trans('student.topic_classes') }}</th>
                                            <th>{{ trans('student.start_at') }}</th>
                                            <th>{{ trans('student.time_class') }}</th>
                                            <th>{{ trans('student.linke_class') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($onlineClasses as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_classe->grade->name}}</td>
                                                <td>{{ $online_classe->classroom->name }}</td>
                                                <td>{{$online_classe->section->name}}</td>
                                                <td>{{$online_classe->subject->name}}</td>
                                                <td>{{$online_classe->created_by}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{ trans('student.join_now') }}</a></td>
                                            </tr>
                                        @endforeach
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
