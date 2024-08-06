@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.list_fees_invoice') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.list_fees_invoice') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_fees_invoice') }}</li>
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




                    {{-- <button style="font-size:18px ;font-weight:bold" type="button" class="button x-small"
                        data-toggle="modal" data-target="#exampleModal">
                        {{ trans('student.add_invoice') }}
                    </button> --}}

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info">{{ trans('student.name') }}</th>
                                    <th class="alert-success">{{ trans('site.grade') }}</th>
                                    <th class="alert-success">{{ trans('site.classroom') }}</th>
                                    <th class="alert-success">{{ trans('student.amount') }}</th>
                                    <th class="alert-success">{{ trans('student.type_fee') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($fees_invoices as $fee_invoice)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $fee_invoice->student->name }}</td>
                                        <td>{{ $fee_invoice->grade->name }}</td>
                                        <td>{{ $fee_invoice->classroom->name }}</td>
                                        <td>{{ $fee_invoice->amount }}</td>
                                        <td>{{ $fee_invoice->fee->title }}</td>

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
