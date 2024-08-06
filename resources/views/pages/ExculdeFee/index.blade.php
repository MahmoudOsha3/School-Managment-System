@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('student.list_exculde') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('student.list_exculde') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<h3> {{ trans('student.list_exculde') }}</h3> <br>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('student.name') }}</th>
                                            <th>{{ trans('student.amount_exculde') }}</th>
                                            <th>{{ trans('student.date_exculde') }}</th>
                                            <th>{{ trans('student.cause_exculde') }}</th>
                                            <th>{{ trans('site.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exculde_fees as $exculde_fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exculde_fee->student->name }}</td>
                                                <td>{{ number_format($exculde_fee->amount , 2) }}</td>
                                                <td>{{ $exculde_fee->date }}</td>
                                                <td>{{ $exculde_fee->description }}</td>
                                                <td>
                                                    <a href="{{ route('receiptStudent.edit', $exculde_fee->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $exculde_fee->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            {{-- @include('pages.Receipt.Delete') --}}
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
