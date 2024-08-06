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
    <!-- row -->
    <div class="row">
        <h3><?php echo e(trans('student.online_classes')); ?></h3>
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="<?php echo e(route('onlineclass.create')); ?>" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"><?php echo e(trans('student.create_meeting')); ?></a><br><br>
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
                                            <th><?php echo e(trans('site.action')); ?></th>
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
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo e($online_classe->id); ?>" ><i class="fa fa-trash"></i></button>
                                            </td>
                                            </tr>
                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($online_classe->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('site.delete')); ?></h4>
                                                        
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('onlineclass.destroy', $online_classe->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input type="text" name="meeting_id"
                                                                value="<?php echo e($online_classe->meeting_id); ?>"
                                                                class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/OnlineClasses/index.blade.php ENDPATH**/ ?>