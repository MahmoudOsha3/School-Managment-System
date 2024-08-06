@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.student_pay') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.student_pay') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.student_pay') }}</li>
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
                    <h3>{{ trans('student.student') }} : {{ $payments[0]->student->name }}</h3><br>
                    <div class="row">
                        <?php
                            $total_fees =  \App\Models\FeesInvoice::where('student_id' , $payments[0]->student->id )->sum('amount') ;
                            $payment_student = $payments->sum('debit') ;
                        ?>
                        <h5 style="padding:0 10px">{{ trans('student.total_fee') }} : {{ $total_fees }}</h5>
                        <h5 style="padding:0 20px"  class="text-success">{{ trans('student.student_pay') }} : {{  $payment_student }}</h5>
                        <h5 style="padding:0 20px"  class="text-danger">{{ trans('student.depit_fee_student') }} : {{ $total_fees - $payment_student }}</h5>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">{{ trans('site.grade') }}</th>
                                    <th class="alert-success">{{ trans('site.classroom') }}</th>
                                    <th class="alert-success">{{ trans('student.amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $payment->student->grade->name }}</td>
                                        <td>{{ $payment->student->classroom->name }}</td>
                                        <td>{{ $payment->debit }}</td>
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
