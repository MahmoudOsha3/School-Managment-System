
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo \Livewire\Livewire::styles(); ?>

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

        <?php echo $__env->make('layouts.main-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> <?php echo e(trans('site.dashboard_teacher')); ?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <br>

            <!-- row of (student , teachers , patent , sections )count  -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="bi bi-person" style="font-size: 40px"></i>
                                        
                                        
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.count_students')); ?></h5>
                                    <h4><?php echo e($student_count); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('teacher.students')); ?>">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    <?php echo e(trans('site.display_data')); ?>

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
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.num_books')); ?></h5>
                                    <h4><?php echo e($books_count); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('teachers.index')); ?>">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    <?php echo e(trans('site.display_data')); ?>

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
                                    <span class="text-primary">
                                        <i class="bi bi-display" style="font-size: 40px"></i>
                                        
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.count_sections')); ?></h5>
                                    <h4><?php echo e($sections_count); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('teacher.sections')); ?>">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    <?php echo e(trans('site.display_data')); ?>

                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- charts -->
            <div class="row">
                <div class="col-xl-4 mb-30">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">نسبة النجاح </h5>
                            <div class="row mb-30">
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left">Positive</p>
                                        <i class="mb-10 text-success float-right fa fa-arrow-up"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-success" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="mt-10 text-success">8501</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left">Negative</p>
                                        <i class="mb-10 text-danger float-right fa fa-arrow-down"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-danger" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="mt-10 text-danger">3251</h4>
                                </div>
                            </div>
                            <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                <div id="canvas-holder">
                                    <canvas id="canvas3" width="550"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 mb-30">
                    <div class="card h-100">
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                                <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                    all</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-block d-md-flexx justify-content-between">
                                <div class="d-block">
                                    <h5 class="card-title">نسبة الالتحاق بالمدرسة</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="clearfix mr-30">
                                        <h6 class="text-success">Income</h6>
                                        <p>+584</p>
                                    </div>
                                    <div class="clearfix  mr-50">
                                        <h6 class="text-danger"> Outcome</h6>
                                        <p>-255</p>
                                    </div>
                                </div>
                            </div>
                            <div id="morris-area" style="height: 320px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            


            
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('calendar', [])->html();
} elseif ($_instance->childHasBeenRendered('PZaOXav')) {
    $componentId = $_instance->getRenderedChildComponentId('PZaOXav');
    $componentTag = $_instance->getRenderedChildComponentTagName('PZaOXav');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PZaOXav');
} else {
    $response = \Livewire\Livewire::mount('calendar', []);
    $html = $response->html();
    $_instance->logRenderedChild('PZaOXav', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>



            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    <?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/index.blade.php ENDPATH**/ ?>