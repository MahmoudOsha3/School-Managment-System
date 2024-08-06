@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('student.student_exculd') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('student.student_exculd') }} {{ $student->name }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<h3>{{ trans('student.student_exculd') }} {{ $student->name }}</h3> <br>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('exculdeFees.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.name') }}<span class="text-danger">*</span></label>
                                <input type="hidden" name="student_id" value="{{ $student->id }}"
                                    class="form-control">
                                <input type="text" readonly name="student_name" value="{{ $student->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('site.grade') }}<span class="text-danger">*</span></label>
                                <input type="text" readonly name="grade" value="{{ $student->grade->name }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('site.classroom') }}<span class="text-danger">*</span></label>
                                <input type="text" name="classroom" value="{{ $student->classroom->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.total_fee') }}</label>
                                <input  class="form-control" name="total_fee" value="{{ number_format($student->student_account->sum('debit')) }}" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.student_pay') }}</label>
                                <input  class="form-control" name="pay" value="{{ number_format($student->student_account->sum('credit'), 2) }}" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.depit_fee_student') }}</label>
                                <input  class="form-control" name="depit" value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.amount_exculde') }}</label>
                                <input  class="form-control" name="amount"  type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('student.cause_exculde') }}</label>
                                <input  class="form-control" name="description"  type="text">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('site.submit') }}</button>
                </form>

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
