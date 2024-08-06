@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{ trans('student.list_students') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.list_students') }}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('site.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.list_students') }}</li>
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


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('student.student') }}</th>
                                    <th>{{ trans('site.email') }}</th>
                                    <th>{{ trans('student.Date_of_Birth') }}</th>
                                    <th>{{ trans('site.grade') }}</th>
                                    <th>{{ trans('site.classroom') }}</th>
                                    <th>{{ trans('site.section') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->date_birth }}</td>
                                        <td><?php echo $student->grade->name ?? 'Null'; ?></td>
                                        <td><?php echo $student->classroom->name ?? 'Null'; ?></td>
                                        <td><?php echo $student->section->name ?? 'Null'; ?></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ trans('site.action') }}
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('students.show', $student->id) }}"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        {{ trans('student.show_data_student') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('students.edit', $student->id) }}"><i
                                                            style="color:green" class="fa fa-edit"></i>&nbsp;
                                                        {{ trans('student.edit_data_student') }}</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('feesInvoices.show', $student->id) }}"><i
                                                            style="color: #0000cc"
                                                            class="fa fa-edit"></i>&nbsp;{{ trans('student.add_invoice_student') }}&nbsp;</a>

                                                    <a class="dropdown-item" href="{{route('receiptStudent.show',$student->id)}}"><i style="color: #121618" class="fa fa-money-bill-alt"></i>&nbsp; &nbsp;{{ trans('student.pay_fees') }}</a>
                                                    <a class="dropdown-item" href="{{route('exculdeFees.show',$student->id)}}"><i style="color: #121618" class="fa fa-money-bill-alt"></i>&nbsp; &nbsp;{{ trans('student.exculde_fee') }}</a>


                                                    <a class="dropdown-item" data-target="#delete{{ $student->id }}"
                                                        data-toggle="modal"
                                                        href="##Delete_Student{{ $student->id }}"><i
                                                            style="color: red" class="fa fa-trash"></i>&nbsp;
                                                        {{ trans('student.delete_data_student') }}</a>
                                                </div>
                                            </div>
                                            {{-- <a style="font-size:18px ;font-weight:bold" href="{{ route('students.edit' , $student->id ) }}" type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$student->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <a href="{{route('students.show', $student->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a> --}}
                                        </td>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('student.delete_student') }}</h4>
                                                        {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('students.destroy', $student->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="text" name="name"
                                                                value="{{ $student->getTranslation('name', App::getLocale()) }}"
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
@endsection

@section('js')
@toastr_js
@toastr_render
@endsection
