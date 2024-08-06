@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.list_fees') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.list_fees') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_fees') }}</li>
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




                    <button style="font-size:18px ;font-weight:bold" type="button" class="button x-small"
                        data-toggle="modal" data-target="#exampleModal">
                        {{ trans('student.add_fees') }}
                    </button>

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info">{{ trans('student.name') }}</th>
                                    <th class="alert-success">{{ trans('student.amount') }}</th>
                                    <th class="alert-success">{{ trans('site.grade') }}</th>
                                    <th class="alert-success">{{ trans('site.classroom') }}</th>
                                    <th class="alert-success">{{ trans('student.year') }}</th>
                                    <th class="alert-success">{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($fees as $fee)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $fee->title }}</td>
                                        <td>{{ $fee->amount }}</td>
                                        <td>{{ $fee->grade->name }}</td>
                                        <td>{{ $fee->classroom->name }}</td>
                                        <td>{{ $fee->year }}</td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#edit{{ $fee->id }}">
                                                {{ trans('site.edit') }}
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleted{{ $fee->id }}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- update fees model -->
                                        <div class="modal fade" id="edit{{ $fee->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('site.edit') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('fees.update', $fee->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2">{{ trans('site.ar.name') }}
                                                                        :</label>
                                                                    <input  type="text" value="{{ $fee->getTranslation('title' , 'ar') }}" name="name_ar" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2">{{ trans('site.en.name') }}
                                                                        :</label>
                                                                    <input type="text" value="{{ $fee->getTranslation('title' , 'en') }}" class="form-control" name="name_en">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2">{{ trans('site.grade') }}
                                                                        :</label>
                                                                    <select name="grade_id" class="form-control">
                                                                        <option value="{{ null }}" selected disabled>{{ trans('student.Choose') }}
                                                                            ... </option>
                                                                        @foreach ($grades as $grade)
                                                                            <option value="{{ $grade->id }}" @selected($grade->id === $fee->grade->id )>{{ $grade->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2">{{ trans('site.classroom') }}
                                                                        :</label>
                                                                    <select name="classroom_id" class="form-control">
                                                                        <option value="{{ null }}" selected disabled>{{ trans('student.Choose') }}
                                                                            ... </option>
                                                                        @foreach ($classrooms as $classroom)
                                                                            <option value="{{ $classroom->id }}" @selected($classroom->id === $fee->classroom->id )>{{ $classroom->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2">{{ trans('student.amount') }}
                                                                        :</label>
                                                                    <input id="Name" type="text" name="amount" value="{{ $fee->amount }}" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2">{{ trans('student.year') }}
                                                                        :</label>
                                                                        <select name="year" class="form-control">
                                                                            <option selected disabled>{{ trans('student.Choose') }}...</option>
                                                                            @php
                                                                                $current_year = date('Y');
                                                                            @endphp
                                                                            @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                                                <option value="{{ $year }}">{{ $year }}</option>
                                                                            @endfor
                                                                        </select>
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
                                        <div class="modal fade" id="deleted{{ $fee->id }}" tabindex="-1"
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
                                                        <form action="{{ route('fees.destroy', $fee->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h5>{{ trans('site.delete') }} : {{ $fee->title }} - {{ $fee->grade->name }} - {{ $fee->classroom->name }}
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


<!-- add_modal_fees -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                    {{ trans('student.add_fees') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('fees.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2">{{ trans('site.ar.name') }}
                                :</label>
                            <input id="Name" type="text" name="name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2">{{ trans('site.en.name') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2">{{ trans('site.grade') }}
                                :</label>
                            <select name="grade_id" class="form-control">
                                <option value="{{ null }}" selected disabled>{{ trans('student.Choose') }}
                                    ... </option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2">{{ trans('site.classroom') }}
                                :</label>
                                <select name="classroom_id" class="form-control">

                                {{-- @foreach ($classrooms as $classroom) --}}
                                    {{-- <option value="{{ $classroom->id }}">{{ $classroom->name }}</option> --}}
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2">{{ trans('student.amount') }}
                                :</label>
                            <input id="Name" type="text" name="amount" class="form-control">
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2">{{ trans('student.year') }}
                                :</label>
                                <select name="year" class="form-control">
                                    <option selected disabled>{{ trans('student.Choose') }}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                        </div>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('site.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('site.submit') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- breadcrumb -->
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
                        $('select[name="classroom_id"]').append('<option selected disabled >' +' {{ trans('student.Choose') }}' + '</option>');
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
@endsection
