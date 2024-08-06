@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('site.edit_teacher') }}
@stop
@endsection
@section('page-header')
    <h4>{{ trans('site.edit_teacher') }}</h4>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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
                            <form action="{{route('teachers.update' , $teacher->id )}}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('site.email')}}</label>
                                    <input type="email" name="email" value="{{ $teacher->email }}" class="form-control">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('site.password')}}</label>
                                    <input type="password" name="password" value="{{ $teacher->password }}" class="form-control">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('site.ar.name')}}</label>
                                    <input type="text" name="name_ar" value="{{ $teacher->getTranslation('name' , 'ar') }}" class="form-control">
                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('site.en.name')}}</label>
                                    <input type="text" name="name_en" value="{{ $teacher->getTranslation('name' , 'en') }}" class="form-control">
                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('site.specailization')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="special_id">
                                        <option selected disabled>{{trans('site.Choose')}}...</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}" @selected($teacher->specialization_id == $specialization->id) >{{$specialization->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('special_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{trans('site.gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        {{-- <option selected disabled>{{trans('Parent_trans.Choose')}}...</option> --}}
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}" @selected($gender->id == $teacher->gender_id)>{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('site.joining_date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" value="{{ $teacher->joining_date }}"  id="datepicker-action" name="joining_date" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('joining_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('site.address')}}</label>
                                <textarea class="form-control" name="address"
                                        id="exampleFormControlTextarea1" rows="4">{{ $teacher->address }}</textarea>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('site.submit')}}</button>
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
