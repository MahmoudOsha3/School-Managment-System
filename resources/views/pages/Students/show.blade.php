@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('student.student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('student.student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('student.student_details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('student.stu_attachments')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('student.name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{trans('site.email')}}</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">{{trans('site.gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{trans('student.nationality')}}</th>
                                            <td>{{$student->nationaity->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('site.grade')}}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{trans('site.classroom')}}</th>
                                            <td>{{$student->classroom->name}}</td>
                                            <th scope="row">{{trans('site.section')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{trans('student.Date_of_Birth')}}</th>
                                            <td>{{ $student->date_birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('site.parent')}}</th>
                                            <td>{{ $student->Myparent->Name_Father}}</td>
                                            <th scope="row">{{trans('student.academic_year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{ route('upload_attachments') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('student.stu_attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="images[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                        {{trans('site.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>

                                        <table class="table center-aligned-table mb-0 table table-hover"
                                                style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('student.filename')}}</th>
                                                <th scope="col">{{trans('student.created_at')}}</th>
                                                <th scope="col">{{trans('student.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="{{ url('download_attachments')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                            role="button"><i class="fa fa-download"></i>&nbsp; {{trans('student.download')}}</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $attachment->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">{{trans('site.delete')}}
                                                        </button>

                                                    </td>
                                                    <!-- delete_model -->
                                                    <div class="modal fade" id="delete{{$attachment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('student.delete_student') }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('delete_attachments')}}" method="post">
                                                                    @csrf
                                                                    <input type="text" readonly name="filename" value="{{ $attachment->filename }}" class="form-control">
                                                                    <input type="hidden" name="student_name" value="{{$attachment->imageable->name}}">
                                                                    <input type="hidden" name="student_id" value="{{$attachment->imageable->id}}">
                                                                    <input type="hidden" name="id" value="{{$attachment->id}}">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.close') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>

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
