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
                        <h4 class="mb-0"> <?php echo e(trans('site.dashboard_admin')); ?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><br>

            <!-- row of (student , teachers , patent , sections )count  -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
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
                                    <h4><?php echo e(\App\Models\Student::count()); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('students.index')); ?>">
                                    <span class="text-info">
                                        <i class="bi bi-database-add"></i>
                                    </span>
                                    <?php echo e(trans('site.display_data')); ?>

                                </a>

                                
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-info">
                                        <i class="bi bi-person-workspace" style="font-size: 40px"></i>
                                        
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.count_teachers')); ?></h5>
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
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="bi bi-people" style="font-size: 40px"></i>
                                        
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-dark"><?php echo e(trans('site.count_parent')); ?></h5>
                                    <h4><?php echo e(\App\Models\My_Parent::count()); ?></h4>
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
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
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
                                    <h4><?php echo e(\App\Models\Sections::count()); ?></h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <a href="<?php echo e(route('sections.index')); ?>">
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
                            <h5 class="card-title"><?php echo e(trans('site.Attendance')); ?></h5>
                            <div class="row mb-30">
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left"><?php echo e(trans('student.attend')); ?></p>
                                        <i class="mb-10 text-primary float-right fa fa-arrow-up"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-primary" role="progressbar" style="width: 70%"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="mt-10 text-primary">70%</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <p class="mb-10 float-left"><?php echo e(trans('student.absent')); ?></p>
                                        <i class="mb-10 text-danger float-right fa fa-arrow-down"> </i>
                                    </div>
                                    <div class="progress progress-small">
                                        <div class="skill2-bar bg-danger" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="mt-10 text-danger">30%</h4>
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
            

            <!-- (student , teachers , patent , invoices )tables -->
            <div class="row">
                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title"><?php echo e(trans('site.latest_proccess_system')); ?></h5>
                                    </div>

                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true"><?php echo e(trans('student.students')); ?></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                   role="tab" aria-controls="teachers" aria-selected="false"><?php echo e(trans('site.teachers')); ?>

                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false"><?php echo e(trans('site.Parents')); ?>

                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                                   role="tab" aria-controls="fee_invoices" aria-selected="false"><?php echo e(trans('student.invoices')); ?>

                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th><?php echo e(trans('student.student')); ?></th>
                                                    <th><?php echo e(trans('site.email')); ?></th>
                                                    <th><?php echo e(trans('site.grade')); ?></th>
                                                    <th><?php echo e(trans('site.classroom_id')); ?></th>
                                                    <th><?php echo e(trans('site.section')); ?></th>
                                                    <th><?php echo e(trans('site.date_add')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = \App\Models\Student::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($student->name); ?></td>
                                                        <td><?php echo e($student->email); ?></td>
                                                        <td><?php echo e($student->grade->name); ?></td>
                                                        <td><?php echo e($student->classroom->name); ?></td>
                                                        <td><?php echo e($student->section->name); ?></td>
                                                        <td class="text-success"><?php echo e($student->created_at); ?></td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <td class="alert-danger" colspan="8"><?php echo e(trans('site.no_date_found')); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th><?php echo e(trans('site.teacher')); ?></th>
                                                    <th><?php echo e(trans('site.joining_date')); ?></th>
                                                    <th><?php echo e(trans('site.specailization')); ?></th>
                                                    <th><?php echo e(trans('site.date_add')); ?></th>
                                                </tr>
                                                </thead>

                                                <?php $__empty_1 = true; $__currentLoopData = \App\Models\Teacher::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($teacher->name); ?></td>
                                                        <td><?php echo e($teacher->Joining_Date); ?></td>
                                                        <td><?php echo e($teacher->specialization->name); ?></td>
                                                        <td class="text-success"><?php echo e($teacher->created_at); ?></td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <td class="alert-danger" colspan="8"><?php echo e(trans('site.no_date_found')); ?></td>
                                                    </tr>
                                                    </tbody>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th><?php echo e(trans('site.parent')); ?></th>
                                                    <th><?php echo e(trans('site.email')); ?></th>
                                                    <th><?php echo e(trans('parent.National_ID_Father')); ?></th>
                                                    <th><?php echo e(trans('parent.Phone_Father')); ?></th>
                                                    <th><?php echo e(trans('site.date_add')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>تاريخ الفاتورة</th>
                                                    <th>اسم الطالب</th>
                                                    <th>المرحلة الدراسية</th>
                                                    <th>الصف الدراسي</th>
                                                    <th>القسم</th>
                                                    <th>نوع الرسوم</th>
                                                    <th>المبلغ</th>
                                                    <th>تاريخ الاضافة</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = \App\Models\FeesInvoice::latest()->take(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($section->invoice_date); ?></td>
                                                        <td><?php echo e($section->classroom->name); ?></td>
                                                        <td class="text-success"><?php echo e($section->created_at); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('calendar', [])->html();
} elseif ($_instance->childHasBeenRendered('9YYj7kD')) {
    $componentId = $_instance->getRenderedChildComponentId('9YYj7kD');
    $componentTag = $_instance->getRenderedChildComponentTagName('9YYj7kD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9YYj7kD');
} else {
    $response = \Livewire\Livewire::mount('calendar', []);
    $html = $response->html();
    $_instance->logRenderedChild('9YYj7kD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/dashboard.blade.php ENDPATH**/ ?>