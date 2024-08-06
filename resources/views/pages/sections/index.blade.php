@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
    {{ trans('site.sections') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->

    @section('PageTitle')
    {{ trans('site.sections') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('site.add_section') }}</a>
                </div>

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
                                                                    <th>{{ trans('site.status') }}</th>
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
                                                                                @if($section->status == true)
                                                                                    <label class="badge badge-success">{{ trans('site.active') }}</label>
                                                                                @else
                                                                                    <label class="badge badge-danger">{{ trans('site.not_active') }}</label>
                                                                                @endif
                                                                            </td>

                                                                            <td>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-info btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#edit{{ $section->id }}">{{ trans('site.edit') }}</a>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete{{ $section->id }}">{{ trans('site.delete') }}</a>
                                                                            </td>




                                                                            <!--تعديل قسم  -->
                                                                            <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                style="font-family: 'Cairo', sans-serif;"
                                                                                                id="exampleModalLabel">
                                                                                                {{ trans('Sections_trans.edit_Section') }}
                                                                                            </h5>
                                                                                            <button type="button" class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="{{ route('sections.update', 'test') }}" method="POST">
                                                                                                {{ method_field('patch') }}
                                                                                                {{ csrf_field() }}
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <input type="text" name="section_ar" class="form-control"
                                                                                                            value="{{ $section->getTranslation('name', 'ar') }}">
                                                                                                </div>

                                                                                                <div class="col">
                                                                                                    <input type="text" name="section_en" class="form-control"
                                                                                                        value="{{ $section->getTranslation('name', 'en') }}">
                                                                                                    <input id="id" type="hidden" name="id" class="form-control"value="{{ $section->id }}">
                                                                                                </div>

                                                                                                </div>
                                                                                                <br>


                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('site.grades') }}</label>
                                                                                                <select name="grade_id"
                                                                                                        class="custom-select"
                                                                                                        onclick="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    {{-- <option value="{{ $grade->id }}">{{ $grade->name }}</option> --}}
                                                                                                    @foreach ($list_grades as $grades)
                                                                                                        <option value="{{ $grades->id }}" @selected($grades->id == $section->grade->id) >{{ $grades->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('site.classroom') }}</label>
                                                                                                <select name="class_id" class="custom-select">
                                                                                                    <option value="{{ $section->classroom->id }}">
                                                                                                        {{ $section->classroom->name }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>

                                                                                            <label for="">{{ trans('site.edit_teacher') }}</label>
                                                                                            <select name="teacher_id[]" class="form-select form-control" multiple aria-label="Multiple select example">

                                                                                                @foreach ($section->teachers as $teacher_selected)
                                                                                                    <option value="{{ $teacher_selected['id'] }}" selected>{{ $teacher_selected->name }}  ::  {{ $teacher_selected->specialization->name }}</option>
                                                                                                @endforeach
                                                                                                <option value="" disabled>-------------------------------------</option>
                                                                                                @foreach ($teachers as $teacher)
                                                                                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}  ::  {{ $teacher->specialization->name }}</option>
                                                                                                @endforeach
                                                                                            </select>

                                                                                            <br>
                                                                                            <div class="col">
                                                                                                <input type="radio" name="status"  value="{{ true }}" id="active">
                                                                                                <label for="active">{{ trans('site.active') }}</label>
                                                                                                <br>
                                                                                                <input type="radio" name="status" value="{{ 0 }}" id="disactive">
                                                                                                <label for="disactive">{{ trans('site.disactive') }}</label>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('site.close') }}</button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                                                        </div>
                                                                                </form>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- end edit modal --}}
                                                                            <!-- delete_modal_Grade -->
                                                                            <div class="modal fade" id="delete{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('site.delete_section') }}</h4>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="{{route('sections.destroy' , $section->id)}}" method="post">
                                                                                                @csrf
                                                                                                @method('delete')
                                                                                                <input type="text" name="name" value="{{$section->getTranslation('name' , App::getLocale() )}} - {{ $section->classroom->getTranslation('name' , App::getLocale()) }} -{{ $section->grade->getTranslation('name' , App::getLocale() ) }}" class="form-control" disabled>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.close') }}</button>
                                                                                            <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- end delete modal --}}
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

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('site.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="section_ar" class="form-control"
                                                       placeholder="{{ trans('site.ar.name') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="section_en" class="form-control"
                                                       placeholder="{{ trans('site.en.name') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('site.grades') }}</label>
                                            <select name="grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected disabled>{{ trans('site.grades') }}</option>
                                                @foreach ($list_grades as $list_grade)
                                                    <option value="{{ $list_grade->id }}"> {{ $list_grade->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                    class="control-label">{{ trans('site.classroom') }}</label>
                                            <select name="class_id" class="custom-select">
                                                {{-- select of class is be filled by ajax --}}
                                            </select>
                                        </div>

                                        <br>
                                        <br>

                                        <select name="teacher_id[]" class="form-select form-control" multiple aria-label="Multiple select example">
                                            <option selected disabled value="{{ null }}">Choose teacher of section</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}  ::  {{ $teacher->specialization->name }}</option>
                                            @endforeach
                                        </select>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('site.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('site.submit') }}</button>
                                </div>
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
