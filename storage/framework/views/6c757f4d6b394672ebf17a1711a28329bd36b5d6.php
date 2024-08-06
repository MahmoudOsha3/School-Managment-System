<?php $__env->startSection('css'); ?>
    @toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.student_exculd')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.student_exculd')); ?> <?php echo e($student->name); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<h3><?php echo e(trans('student.student_exculd')); ?> <?php echo e($student->name); ?></h3> <br>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo e(route('exculdeFees.store')); ?>" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.name')); ?><span class="text-danger">*</span></label>
                                <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>"
                                    class="form-control">
                                <input type="text" readonly name="student_name" value="<?php echo e($student->name); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('site.grade')); ?><span class="text-danger">*</span></label>
                                <input type="text" readonly name="grade" value="<?php echo e($student->grade->name); ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('site.classroom')); ?><span class="text-danger">*</span></label>
                                <input type="text" name="classroom" value="<?php echo e($student->classroom->name); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.total_fee')); ?></label>
                                <input  class="form-control" name="total_fee" value="<?php echo e(number_format($student->student_account->sum('debit'))); ?>" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.student_pay')); ?></label>
                                <input  class="form-control" name="pay" value="<?php echo e(number_format($student->student_account->sum('credit'), 2)); ?>" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.depit_fee_student')); ?></label>
                                <input  class="form-control" name="depit" value="<?php echo e(number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2)); ?>" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.amount_exculde')); ?></label>
                                <input  class="form-control" name="amount"  type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('student.cause_exculde')); ?></label>
                                <input  class="form-control" name="description"  type="text">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit"><?php echo e(trans('site.submit')); ?></button>
                </form>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/ExculdeFee/createExculdeFee.blade.php ENDPATH**/ ?>