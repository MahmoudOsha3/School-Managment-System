<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_students')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.list_students')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.list_students')); ?></li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('student.student')); ?></th>
                                    <th><?php echo e(trans('site.grade')); ?></th>
                                    <th><?php echo e(trans('site.classroom')); ?></th>
                                    <th><?php echo e(trans('site.section')); ?></th>
                                    <th><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($student->name); ?></td>
                                        <td><?php echo e($student->grade->name); ?></td>
                                        <td><?php echo e($student->classroom->name); ?></td>
                                        <td><?php echo e($student->section->name); ?></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <?php echo e(trans('site.action')); ?>

                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('parent.students.quizzes', $student->id)); ?>"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        <?php echo e(trans('site.view_degree_student_quizze')); ?></a>

                                                        <a class="dropdown-item"
                                                        href="<?php echo e(route('parent.invoice', $student->id)); ?>"><i
                                                            style="color: #cc006d"
                                                            class="fa fa-edit"></i>&nbsp; <?php echo e(trans('student.list_fees_invoice')); ?>&nbsp;</a>

                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('parent.student.payment', $student->id)); ?>"><i class="bi bi-receipt" style="color: #00cc5c"></i></i>&nbsp; <?php echo e(trans('student.student_pay')); ?>&nbsp;</a>

                                                        <a class="dropdown-item"
                                                        href="<?php echo e(route('stripe.payment.visa', $student->id)); ?>"><i class="bi bi-cash-coin" style="color: #cc0007"></i>&nbsp; <?php echo e(trans('student.pay_fees')); ?>&nbsp;</a>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($student->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('student.delete_student')); ?></h4>
                                                        
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('students.destroy', $student->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input type="text" name="name"
                                                                value="<?php echo e($student->getTranslation('name', App::getLocale())); ?>"
                                                                class="form-control" disabled>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/parent/dashboard/students.blade.php ENDPATH**/ ?>