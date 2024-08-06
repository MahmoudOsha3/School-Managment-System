
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    @livewireStyles
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">{{ trans('student.student') }} : {{ auth()->user()->name }} - {{ auth()->user()->grade->name }} - {{ auth()->user()->classroom->name }} - {{ auth()->user()->section->name }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><br>

            <!-- row of (student , teachers , patent )count  -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="bi bi-people" style="font-size: 40px"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark">{{ trans('site.Attendance') }}</h5>
                                    <h4>{{\App\Models\AttendanceStudent::where('student_id',auth()->user()->id)->count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <div class="row">
                                    <h6 class="col-md-8" class="text-success">{{ trans('student.attend') }} : <span class="text-success">{{ $attendance }}</span></h6><br>
                                    <h6 class="col-md-8" class="text-danger">{{ trans('student.absent') }} : <span class="text-danger">{{ $absent }}</span></h6>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-info">
                                        <i class="bi bi-person-workspace" style="font-size: 40px"></i>
                                        {{-- <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i> --}}
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark">{{ trans('site.Exams') }}</h5>
                                    <h4>{{ \App\Models\Teacher::count() }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="{{ route('teachers.index') }}">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    {{ trans('site.display_data') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="bi bi-file-earmark-pdf" style="font-size: 40px"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark">{{ trans('site.library') }}</h5>
                                    <h4>{{ $books }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="{{ route('add-parents') }}">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    {{ trans('site.display_data') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- calenders --}}
            <livewire:calender-student />



            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>

</html>
