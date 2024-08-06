@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('site.profile') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    {{ trans('site.profile') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


<h3>
    {{ trans('site.profile') }}
</h3>
    <div class="card-body">

        <section style="background-color: #eee;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{URL::asset('assets/images/student.png')}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3">{{$student->name}}</h5>
                            <p class="text-muted mb-1">{{$student->email}}</p>
                            <p class="text-muted mb-4">{{ trans('student.student') }}</p>
                            <p class="text-muted mb-4">{{ $student->grade->name }} - {{ $student->classroom->name }} - {{ $student->section->name }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{route('student.profile.update')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('site.ar.name') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_ar"
                                                   value="{{ $student->getTranslation('name', 'ar') }}"
                                                   class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('site.en.name') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_en"
                                                   value="{{ $student->getTranslation('name', 'en') }}"
                                                   class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ trans('site.password') }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </p><br><br>
                                        <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                               id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">{{ trans('site.apear_password') }}</label>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success">{{ trans('site.edit_data') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
