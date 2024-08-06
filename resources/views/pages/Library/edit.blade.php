@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('student.edit_book')}}
@stop
@endsection
@section('page-header')
    <h3>{{trans('student.edit_book')}}</h3>
    <br>

<!-- breadcrumb -->
@section('PageTitle')
    {{trans('student.edit_book')}}
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

                <form method="post"  action="{{ route('library.update' , $book->id ) }}" autocomplete="off" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>{{trans('student.name_book')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="title" value="{{ $book->title }}"  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">{{trans('site.grade')}} : </label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" @selected($grade->id == $book->grade->id)>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">{{trans('site.classroom_id')}} : </label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    <option value="{{ $book->classroom->id }}">{{ $book->classroom->name }}</option>
                                    {{-- ajax --}}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">{{trans('site.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{ $book->section->id }}">{{ $book->section->name }}</option>
                                    {{-- ajax --}}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bg_id">{{trans('site.teacher')}} : </label>
                                <select class="custom-select mr-sm-2" name="teachers_id">
                                    <option selected disabled>{{trans('student.Choose')}}...</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @selected($teacher->id == $book->teacher->id)>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            {{-- <embed src="{{ URL::asset('attachments/library/'.$book->file_name) }}" type="application/pdf"   height="150px" width="100px"><br><br> --}}
                            <div class="form-group">
                                <label for="academic_year">{{ trans('student.upload_book') }} : <span class="text-danger">*</span></label><br>
                                <input type="file" accept="application/pdf" name="file_name">
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
