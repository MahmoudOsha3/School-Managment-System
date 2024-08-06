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
    <!-- row -->
    <div class="row">
        <h3>{{ trans('student.online_classes') }}</h3>
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('onlineClasses.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('student.create_meeting') }}</a><br><br>
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
                                            <th>{{ trans('site.action') }}</th>
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
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$online_classe->id}}" ><i class="fa fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{$online_classe->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('site.delete') }}</h4>
                                                        {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('onlineClasses.destroy', $online_classe->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="text" name="meeting_id"
                                                                value="{{ $online_classe->meeting_id }}"
                                                                class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
