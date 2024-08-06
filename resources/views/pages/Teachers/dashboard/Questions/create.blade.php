@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('student.add_question') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('student.add_question') }}

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>{{ trans('student.add_question') }} : <span class="text-danger">{{ $quizze->title }}</span></h3><br>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            {{-- autocomplete="off" --}}
                            <form action="{{ route('question.store') }}" method="post" >
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('student.title_ques') }}</label>
                                        <input type="text" name="title" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                        <input type="hidden" value="{{$quizze->id}}" name="quizze_id">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('student.answers') }}</label>
                                        <textarea name="answer" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('student.right_answer') }}</label>
                                        <input type="text" name="right_answer" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{ trans('student.score') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled>{{ trans('student.determine_score') }}</option>
                                                @for ($i = 1 ; $i <= 10 ; $i++ )
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('site.submit') }}</button>
                            </form>
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
