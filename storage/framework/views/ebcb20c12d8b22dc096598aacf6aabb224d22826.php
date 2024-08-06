<?php $__env->startSection('css'); ?>
    @toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.online_classes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
<?php echo e(trans('student.online_classes')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h3><?php echo e(trans('student.online_classes')); ?></h3>

<!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th><?php echo e(trans('student.grade_class')); ?></th>
                                            <th><?php echo e(trans('student.classroom_class')); ?></th>
                                            <th><?php echo e(trans('site.section')); ?></th>
                                            <th><?php echo e(trans('site.subject')); ?></th>
                                            <th><?php echo e(trans('site.teacher')); ?></th>
                                            <th><?php echo e(trans('student.topic_classes')); ?></th>
                                            <th><?php echo e(trans('student.start_at')); ?></th>
                                            <th><?php echo e(trans('student.time_class')); ?></th>
                                            <th><?php echo e(trans('student.linke_class')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $onlineClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $online_classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($online_classe->grade->name); ?></td>
                                                <td><?php echo e($online_classe->classroom->name); ?></td>
                                                <td><?php echo e($online_classe->section->name); ?></td>
                                                <td><?php echo e($online_classe->subject->name); ?></td>
                                                <td><?php echo e($online_classe->created_by); ?></td>
                                                <td><?php echo e($online_classe->topic); ?></td>
                                                <td><?php echo e($online_classe->start_at); ?></td>
                                                <td><?php echo e($online_classe->duration); ?></td>
                                                <td class="text-danger"><a href="<?php echo e($online_classe->join_url); ?>" target="_blank"><?php echo e(trans('student.join_now')); ?></a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/students/dashboard/onlineclasses/index.blade.php ENDPATH**/ ?>