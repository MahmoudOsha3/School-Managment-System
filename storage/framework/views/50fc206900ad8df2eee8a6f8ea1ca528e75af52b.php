
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
                        <h4 class="mb-0"><?php echo e(trans('student.student')); ?> : <?php echo e(auth()->user()->name); ?> - <?php echo e(auth()->user()->grade->name); ?> - <?php echo e(auth()->user()->classroom->name); ?> - <?php echo e(auth()->user()->section->name); ?></h4>
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
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.Attendance')); ?></h5>
                                    <h4><?php echo e(\App\Models\AttendanceStudent::where('student_id',auth()->user()->id)->count()); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <div class="row">
                                    <h6 class="col-md-8" class="text-success"><?php echo e(trans('student.attend')); ?> : <span class="text-success"><?php echo e($attendance); ?></span></h6><br>
                                    <h6 class="col-md-8" class="text-danger"><?php echo e(trans('student.absent')); ?> : <span class="text-danger"><?php echo e($absent); ?></span></h6>
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
                                        
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.Exams')); ?></h5>
                                    <h4><?php echo e(\App\Models\Teacher::count()); ?></h4>
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
                                    <span class="text-danger">
                                        <i class="bi bi-file-earmark-pdf" style="font-size: 40px"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.library')); ?></h5>
                                    <h4><?php echo e($books); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('add-parents')); ?>">
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

            
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('calender-student', [])->html();
} elseif ($_instance->childHasBeenRendered('3n63omw')) {
    $componentId = $_instance->getRenderedChildComponentId('3n63omw');
    $componentTag = $_instance->getRenderedChildComponentTagName('3n63omw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3n63omw');
} else {
    $response = \Livewire\Livewire::mount('calender-student', []);
    $html = $response->html();
    $_instance->logRenderedChild('3n63omw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/dashboard/index.blade.php ENDPATH**/ ?>