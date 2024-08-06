<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.student_pay')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.student_pay')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.student_pay')); ?></li>
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
                    <h3><?php echo e(trans('student.student')); ?> : <?php echo e($payments[0]->student->name); ?></h3><br>
                    <div class="row">
                        <?php
                            $total_fees =  \App\Models\FeesInvoice::where('student_id' , $payments[0]->student->id )->sum('amount') ;
                            $payment_student = $payments->sum('debit') ;
                        ?>
                        <h5 style="padding:0 10px"><?php echo e(trans('student.total_fee')); ?> : <?php echo e($total_fees); ?></h5>
                        <h5 style="padding:0 20px"  class="text-success"><?php echo e(trans('student.student_pay')); ?> : <?php echo e($payment_student); ?></h5>
                        <h5 style="padding:0 20px"  class="text-danger"><?php echo e(trans('student.depit_fee_student')); ?> : <?php echo e($total_fees - $payment_student); ?></h5>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success"><?php echo e(trans('site.grade')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.classroom')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.amount')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($payment->student->grade->name); ?></td>
                                        <td><?php echo e($payment->student->classroom->name); ?></td>
                                        <td><?php echo e($payment->debit); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Parent/Dashboard/FeesInvoice/payments.blade.php ENDPATH**/ ?>