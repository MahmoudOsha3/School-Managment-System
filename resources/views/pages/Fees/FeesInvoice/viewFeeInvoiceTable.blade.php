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
                                    <th class="alert-success">{{ trans('student.invoice_date') }}</th>
                                    <th class="alert-success">{{ trans('site.action') }}</th>
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
                                        <td>{{ $fee_invoice->invoice_date }}</td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#edit{{ $fee_invoice->id }}">
                                                {{ trans('site.edit') }}
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleted{{ $fee_invoice->id }}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- update fees model -->
                                        <div class="modal fade" id="edit{{ $fee_invoice->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.edit_invoice') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('feesInvoices.update', $fee_invoice->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2">{{ trans('student.name') }}
                                                                        :</label>
                                                                    <input  type="text" name="student_id" readonly value="{{ $fee_invoice->student->name }}" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2">{{ trans('student.amount') }}
                                                                        :</label>
                                                                    <input id="name" type="text" name="amount" value="{{ $fee_invoice->amount }}" class="form-control">
                                                                </div>
                                                            </div>

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
                                        <div class="modal fade" id="deleted{{ $fee_invoice->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('site.delete') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('feesInvoices.destroy', $fee_invoice->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h5>{{ trans('student.confirm_delete_invoice') }} : {{ $fee_invoice->student->name }} - {{ $fee_invoice->fee->title }}
                                                            </h5>
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
@endsection

@section('js')
@toastr_js
@toastr_render
@endsection
