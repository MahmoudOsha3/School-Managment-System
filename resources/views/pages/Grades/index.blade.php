@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{trans('site.grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('site.grades')}}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('site.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('site.grades')}}</li>
            </ol>
        </div>
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                @if($errors->any())
                    @foreach ($errors->all() as $errors )
                        <div class="alert alert-danger">>
                            {{$errors}}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <button style="font-size:18px ;font-weight:bold" type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('site.add_grade') }}
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('site.name_grades')}}</th>
                                    <th>{{trans('site.notes')}}</th>
                                    <th>{{trans('site.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$grade->name}}</td>
                                        <td>{{$grade->notes}}</td>
                                        <td>
                                            <button style="font-size:18px ;font-weight:bold" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$grade->id}}">
                                                {{ trans('site.edit') }}
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$grade->id}}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- edit_modal_Grade -->
                                        <div class="modal fade" id="edit{{$grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                                                            {{ trans('site.edit_grade') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="{{route('grade.update' , $grade->id)}}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="name_ar" class="mr-sm-2">{{ trans('site.ar.name') }}
                                                                        :</label>
                                                                    <input id="name_ar" type="text" name="name_ar" value="{{$grade->getTranslation('name', 'ar')}}" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2">{{ trans('site.en.name') }}
                                                                        :</label>
                                                                    <input type="text" class="form-control" name="name_en" value="{{$grade->getTranslation('name', 'en')}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="font-size:18px ;font-weight:bold" for="exampleFormControlTextarea1">{{ trans('site.notes') }}
                                                                    :</label>
                                                                <textarea class="form-control" name="notes"  id="exampleFormControlTextarea1"
                                                                    rows="3">{{$grade->notes}}</textarea>
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

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{$grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('site.warning_delete_grade') }}</h4>
                                                {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('grade.destroy' , $grade->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="text" name="name" value="{{$grade->getTranslation('name' , App::getLocale() )}}" class="form-control" disabled>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
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

        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            {{ trans('site.add_grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route('grade.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name" class="mr-sm-2">{{ trans('site.ar.name') }}
                                        :</label>
                                    <input id="Name" type="text" name="name_ar"  class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2">{{ trans('site.en.name') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="exampleFormControlTextarea1">{{ trans('site.notes') }}
                                    :</label>
                                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
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

    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
