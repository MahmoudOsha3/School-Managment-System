<?php $__env->startSection('css'); ?>
    @toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_recepit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.list_recepit')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<h3> <?php echo e(trans('student.list_recepit')); ?></h3> <br>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th><?php echo e(trans('student.name')); ?></th>
                                            <th><?php echo e(trans('student.amount')); ?></th>
                                            <th><?php echo e(trans('student.invoice_date')); ?></th>
                                            <th><?php echo e(trans('site.action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $receipt_students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($receipt_student->student->name); ?></td>
                                                <td><?php echo e(number_format($receipt_student->debit, 2)); ?></td>
                                                <td><?php echo e($receipt_student->date); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('receiptStudent.edit', $receipt_student->id)); ?>"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt<?php echo e($receipt_student->id); ?>"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Recepit/index.blade.php ENDPATH**/ ?>