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
                                    <th><?php echo e(trans('site.email')); ?></th>
                                    <th><?php echo e(trans('student.Date_of_Birth')); ?></th>
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
                                        <td><?php echo e($student->email); ?></td>
                                        <td><?php echo e($student->date_birth); ?></td>
                                        <td><?php echo $student->grade->name ?? 'Null'; ?></td>
                                        <td><?php echo $student->classroom->name ?? 'Null'; ?></td>
                                        <td><?php echo $student->section->name ?? 'Null'; ?></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <?php echo e(trans('site.action')); ?>

                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('students.show', $student->id)); ?>"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        <?php echo e(trans('student.show_data_student')); ?></a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('students.edit', $student->id)); ?>"><i
                                                            style="color:green" class="fa fa-edit"></i>&nbsp;
                                                        <?php echo e(trans('student.edit_data_student')); ?></a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('feesInvoices.show', $student->id)); ?>"><i
                                                            style="color: #0000cc"
                                                            class="fa fa-edit"></i>&nbsp;<?php echo e(trans('student.add_invoice_student')); ?>&nbsp;</a>

                                                    <a class="dropdown-item" href="<?php echo e(route('receiptStudent.show',$student->id)); ?>"><i style="color: #121618" class="fa fa-money-bill-alt"></i>&nbsp; &nbsp;<?php echo e(trans('student.pay_fees')); ?></a>
                                                    <a class="dropdown-item" href="<?php echo e(route('exculdeFees.show',$student->id)); ?>"><i style="color: #121618" class="fa fa-money-bill-alt"></i>&nbsp; &nbsp;<?php echo e(trans('student.exculde_fee')); ?></a>


                                                    <a class="dropdown-item" data-target="#delete<?php echo e($student->id); ?>"
                                                        data-toggle="modal"
                                                        href="##Delete_Student<?php echo e($student->id); ?>"><i
                                                            style="color: red" class="fa fa-trash"></i>&nbsp;
                                                        <?php echo e(trans('student.delete_data_student')); ?></a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/students.blade.php ENDPATH**/ ?>