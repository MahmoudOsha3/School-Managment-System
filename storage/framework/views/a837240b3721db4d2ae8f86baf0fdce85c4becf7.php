<?php $__env->startSection('css'); ?>
    @toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.report_quizze')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
<?php echo e(trans('site.report_quizze')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <h3><?php echo e(trans('site.report_quizze')); ?> : <?php echo e($quizze->title); ?> , <span class="text-success"> <?php echo e(trans('site.total_score')); ?> : <?php echo e($quizze->question->sum('score')); ?></span></h3><br>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h6 class="text-success"><?php echo e(trans('site.count_student_done_quizze')); ?> : <?php echo e($reports->count()); ?></h6>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th><?php echo e(trans('student.student')); ?></th>
                                            <th><?php echo e(trans('site.grade')); ?></th>
                                            <th><?php echo e(trans('site.classroom')); ?></th>
                                            <th><?php echo e(trans('site.section')); ?></th>
                                            <th><?php echo e(trans('student.score')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($report->student->name); ?></td>
                                                <td><?php echo e($report->student->grade->name); ?></td>
                                                <td><?php echo e($report->student->classroom->name); ?></td>
                                                <td><?php echo e($report->student->section->name); ?></td>
                                                <td class="text-success"><?php echo e($report->score_student); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Quizze/report.blade.php ENDPATH**/ ?>