@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{trans('student.manage_promotion')}}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('student.manage_promotion')}}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('site.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('student.manage_promotion')}}</li>
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

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#return">
                        {{ trans('student.return_process') }}
                    </button>

                    {{-- <a class="button x-small btn-danger" href="{{ route('promotions.create') }}">
                            {{ trans('student.return_process') }}</a> --}}

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info">{{trans('student.student')}}</th>
                                    <th class="alert-danger">{{ trans('student.pre_grade') }}</th>
                                    <th class="alert-danger">{{trans('student.pre_classroom')}}</th>
                                    <th class="alert-danger">{{trans('student.pre_section')}}</th>
                                    <th class="alert-success">{{trans('student.current_grade')}}</th>
                                    <th class="alert-success">{{trans('student.current_classroom')}}</th>
                                    <th class="alert-success">{{trans('student.current_section')}}</th>
                                    <th class="alert-danger">{{trans('site.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$promotion->student->name}}</td>
                                        <td>{{$promotion->fromGrade->name}}</td>
                                        <td>{{$promotion->fromClassroom->name}}</td>
                                        <td>{{$promotion->fromSection->name}}</td>
                                        <td>{{$promotion->toGrade->name}}</td>
                                        <td>{{$promotion->toClassroom->name}}</td>
                                        <td>{{$promotion->toSection->name}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#returnPromotion{{$promotion->id}}">
                                                {{ trans('student.btn-return-promotion') }}
                                            </button>
                                        </td>

                                        <!-- return one student promotion model -->
                                        <div class="modal fade" id="returnPromotion{{$promotion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('student.return_promotion') }}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('return.promotion' , $promotion->id )}}" method="get">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="id" value="{{ $promotion->id }}">
                                                        <p>{{ trans('student.return_promotion') }} : {{ $promotion->student->name }}</p>
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
    </div>
</div>


    <!-- return all promotions model -->
    <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('promotion.delete_promotion') }}</h4>
            {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('promotions.destroy' , 'test')}}" method="post">
                    @csrf
                    @method('delete')
                    <p>{{trans('student.confrim_return')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                </form>
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
