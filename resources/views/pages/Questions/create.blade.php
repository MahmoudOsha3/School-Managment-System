@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('student.add_question')}}
@stop
@endsection
@section('page-header')
    <h3>{{trans('student.add_question')}}</h3>
    <br>

<!-- breadcrumb -->
@section('PageTitle')
    {{trans('student.add_question')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
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

                <form method="post"  action="{{ route('questions.store') }}" autocomplete="off" >
                    @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>{{trans('student.title_ques')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="title"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('student.answers')}} : </label>
                                    <input type="text"  name="answer" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('student.right_answer')}} : </label>
                                    <input type="text"  name="right_answer" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('student.score')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="score">
                                        <option selected disabled>{{trans('student.Choose')}}...</option>
                                        @for ($i = 1 ; $i <= 10 ; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('student.quizze')}} : </label>
                                    <select class="custom-select mr-sm-2" name="quizze_id">
                                        <option selected disabled>{{trans('student.Choose')}}...</option>
                                        @foreach($quizzes as $quizze)
                                            <option value="{{ $quizze->id }}">{{ $quizze->grade->name }} - {{ $quizze->classroom->name }} - {{ $quizze->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('site.submit')}}</button>
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
    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('get_sections') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
