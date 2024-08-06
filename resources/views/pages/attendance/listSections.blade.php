@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
    {{ trans('student.list_att_section') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->

@section('PageTitle')
{{ trans('student.list_att_section') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($grades as $grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('site.sections') }}
                                                                    </th>
                                                                    <th>{{ trans('site.classroom') }}</th>
                                                                    <th>{{ trans('site.action') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php  $i = 0; ?>
                                                                    @foreach ($grade->sections as $section)
                                                                        <tr>
                                                                            <?php   $i++; ?>
                                                                            <td>{{ $i }}</td>
                                                                            {{-- Section اسم الفصل --}}
                                                                            <td>{{ $section->name }}</td>
                                                                            {{-- classroom الصف الدراسي --}}
                                                                            <td>{{ $section->classroom->name }}
                                                                            <td>
                                                                                {{-- قائمة الطلاب --}}
                                                                                <a href="{{ route('attendance.show' , $section->id ) }}"
                                                                                    class="btn btn-outline-info btn-sm">{{ trans('student.list_students') }}</a>
                                                                            </td>
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
                                    @endforeach
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
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
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
