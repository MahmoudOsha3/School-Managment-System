@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('student.add_invoice_student') }}
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
    <h4>{{ trans('student.add_invoice') }} : {{ $student->name }}</h4>
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

                        <form class=" row mb-30" action="{{ route('feesInvoices.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_Fees">
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{ trans('student.student') }}</label>
                                                    <select class="fancyselect" name="student_id" required>
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('student.type_fee') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" required>
                                                            <option value="">{{ trans('student.Choose') }}</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('student.amount') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="amount" required>
                                                            <option value="">-- اختار من القائمة --</option>
                                                            @foreach($fees as $fee)
                                                                <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('site.action') }}:</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('site.delete') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('site.add') }}"/>
                                        </div>
                                    </div><br>
                                    {{-- outside repeater this mean it is be send once only --}}
                                    <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                                    <input type="hidden" name="classroom_id" value="{{$student->classroom_id}}">

                                    <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
                                </div>
                            </div>
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

    {{-- <script>
        $(document).ready(function() {
            $('select[name="fee_id"]').on('change', function(){
                var fee_id = $(this).val();
                if(fee_id){
                    $.ajax({
                        url: "{{ route('get_amount' ,"fee_id") }}/",
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            $('select[name="amount"]').empty();
                            $.each(data, function(key , value){
                                $('select[name="amount"]').append('<option value="' + value + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="amount"]').empty();
                }
            });
        });

    </script> --}}

@endsection
