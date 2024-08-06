@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.students_graduate') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.list_graduate') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_graduate') }}</li>
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


                    <a class="button x-small btn-primary" href="{{ route('graduates.create') }}">
                        {{ trans('student.create_graduate') }}</a>

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info">{{ trans('student.student') }}</th>
                                    <th class="alert-success">{{ trans('site.grade') }}</th>
                                    <th class="alert-success">{{ trans('site.classroom') }}</th>
                                    <th class="alert-success">{{ trans('student.year_graduate') }}</th>
                                    <th class="alert-success">{{ trans('student.month_graduate') }}</th>
                                    <th class="alert-success">{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->classroom->name }}</td>
                                        <td>{{ $student->deleted_at->year }}</td>
                                        <td>{{ $student->deleted_at->month }}</td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#returnGraduation{{ $student->id }}">
                                                {{ trans('student.return_graduate') }}
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleted{{ $student->id }}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- return one student from graduation model -->
                                        <div class="modal fade" id="returnGraduation{{ $student->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.return_graduate') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('graduates.update', $student->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <p>{{ trans('student.return_graduate_message') }} :
                                                                {{ $student->name }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">{{ trans('site.submit') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- deleted  student from DB model -->
                                        <div class="modal fade" id="deleted{{ $student->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.delete_student') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('graduates.destroy', $student->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h5>{{ trans('student.student') }} : {{ $student->name }}
                                                            </h5>
                                                            <p>{{ trans('student.deleted_finish_message') }}</p>
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


<!-- return all promotions model -->
<div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('promotion.delete_promotion') }}</h4>
                {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promotions.destroy', 'test') }}" method="post">
                    @csrf
                    @method('delete')
                    <p>{{ trans('student.confrim_return') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('site.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                </form>
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
