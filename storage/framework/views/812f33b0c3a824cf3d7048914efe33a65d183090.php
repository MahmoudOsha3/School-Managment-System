<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.quizzes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.quizzes')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.quizzes')); ?></li>
            </ol>
        </div>
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger">>
                            <?php echo e($errors); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="card-body">
                    <h3><?php echo e(trans('student.student')); ?> : <span class="text-success"><?php echo e($reports[0]->student->name); ?></span></h3><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('student.quizze')); ?></th>
                                    <th><?php echo e(trans('student.subject')); ?></th>
                                    <th><?php echo e(trans('site.grade')); ?></th>
                                    <th><?php echo e(trans('site.classroom_id')); ?></th>
                                    <th><?php echo e(trans('site.section')); ?></th>
                                    <th><?php echo e(trans('site.total_score')); ?></th>
                                    <th><?php echo e(trans('site.score_student')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($report->quizze->title); ?></td>
                                        <td><?php echo e($report->quizze->subject->name); ?></td>
                                        <td><?php echo e($report->quizze->grade->name); ?></td>
                                        <td><?php echo e($report->quizze->classroom->name); ?></td>
                                        <td><?php echo e($report->quizze->section->name); ?></td>
                                        <td><?php echo e($report->score_quizze); ?></td>
                                        <td><?php echo e($report->score_student); ?></td>
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
<!-- breadcrumb -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
@toastr_js
@toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/parent/dashboard/quizzes.blade.php ENDPATH**/ ?>