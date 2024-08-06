@extends('layouts.master')
@section('css')
@livewireStyles
<style>

    .container {
        text-align: center;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    .container h1 {
        color: #4caf50;
    }
    .container p {
        font-size: 18px;
        color: #333;
    }
    .score {
        font-size: 24px;
        color: #ff5722;
        margin-top: 10px;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #45a049;
    }
</style>
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.list_question') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.quizze') }} : {{ $quizze->title }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_question') }}</li>
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
                    @livewire('show-questions', ['quizze_id' => $quizze_id ])
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
@livewireScripts
@endsection
