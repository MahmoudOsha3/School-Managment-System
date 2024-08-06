@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.exams') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.exams') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.exams') }}</li>
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('student.add_exam') }}
                    </button>


                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('student.exam') }}</th>
                                    <th>{{ trans('student.term') }}</th>
                                    <th>{{ trans('student.academic_year') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $exam->title }}</td>
                                        <td>{{$exam->term }}</td>
                                        <td>{{$exam->acadmeic_year }}</td>
                                        <td>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$exam->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$exam->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>


                                        @include('pages.Exams.updatedModel')
                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{ $exam->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.delete_exam') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('exams.destroy', $exam->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="text" name="name"
                                                                value="{{ $exam->getTranslation('title', App::getLocale()) }}"
                                                                class="form-control" disabled>

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
@include('pages.Exams.addedModel')
@endsection

@section('js')
@toastr_js
@toastr_render

@endsection
