@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
     {{ trans('site.library') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3> {{ trans('site.library') }} </h3><br>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('student.name_book') }}</th>
                                                <th>{{ trans('site.grade') }}</th>
                                                <th>{{ trans('site.classroom') }}</th>
                                                <th>{{ trans('site.section') }}</th>
                                                <th>{{ trans('site.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->grade->name }}</td>
                                                    <td>{{ $book->classroom->name }}</td>
                                                    <td>{{ $book->section->name }}</td>
                                                    <td>
                                                        <center>
                                                            <a href="{{ route('student.book.download' , $book->id ) }}" title="{{ trans('student.download') }}" type="button" class="btn btn-success btn-sm">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </center>

                                                    </td>

                                                    <!-- delete_model -->
                                                    <div class="modal fade" id="delete{{ $book->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ trans('student.delete_book') }}</h4>
                                                                    {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('libraries.destroy', $book->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="name"
                                                                            value="{{ $book->title }}"
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
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
