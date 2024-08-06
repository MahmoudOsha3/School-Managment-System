@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.quizzes') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.quizzes') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.quizzes') }}</li>
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
                                    <th>{{ trans('student.quizze') }}</th>
                                    <th>{{ trans('student.subject') }}</th>
                                    <th>{{ trans('site.grade') }}</th>
                                    <th>{{ trans('site.classroom_id') }}</th>
                                    <th>{{ trans('site.section') }}</th>
                                    <th>{{ trans('site.teacher') }}</th>
                                    <th>{{ trans('site.total_score') }}</th>
                                    <th>{{ trans('site.enter_score') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $quizze->title }}</td>
                                        <td>{{$quizze->subject->name }}</td>
                                        <td>{{$quizze->grade->name }}</td>
                                        <td>{{$quizze->classroom->name }}</td>
                                        <td>{{$quizze->section->name }}</td>
                                        <td>{{$quizze->teacher->name }}</td>
                                        <td>{{$quizze->question->sum('score') }}</td>
                                        <td>
                                            <center>
                                                @if ($quizze->report_degree_quizze->where('student_id' , auth()->user()->id )->count() == 1)
                                                    {{ $quizze->report_degree_quizze->where('student_id' , auth()->user()->id )->pluck('score_student')->first() }}
                                                @else
                                                    <a href="{{ route('student.quizze.strat' , $quizze->id ) }}" class="btn btn-success btn-sm" >
                                                        {{ trans('student.join_now') }} <i class="bi bi-card-text"></i>
                                                    </a>
                                                @endif

                                            </center>
                                        </td>


                                        {{-- @include('pages.Quizzes.updatedModel') --}}
                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{ $quizze->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.delete_quizee') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('quizzes.destroy', $quizze->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="text" name="name"
                                                                value="{{ $quizze->getTranslation('title', App::getLocale()) }}"
                                                                class="form-control" disabled>

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
{{-- @include('pages.Quizzes.addedModel') --}}
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
                        $('select[name="classroom_id"]').append('<option value="" disabled selected>' +  "{{ trans('student.Choose') }}" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    $(document).ready(function () {
        $('select[name="classroom_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('get_sections') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option value="" disabled selected>' +  "{{ trans('student.Choose') }}" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

@endsection
