<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_fees_invoice')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.list_fees_invoice')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.list_fees_invoice')); ?></li>
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

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info"><?php echo e(trans('student.name')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.grade')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.classroom')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.amount')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.type_fee')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.invoice_date')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $fees_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fee_invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($fee_invoice->student->name); ?></td>
                                        <td><?php echo e($fee_invoice->grade->name); ?></td>
                                        <td><?php echo e($fee_invoice->classroom->name); ?></td>
                                        <td><?php echo e($fee_invoice->amount); ?></td>
                                        <td><?php echo e($fee_invoice->fee->title); ?></td>
                                        <td><?php echo e($fee_invoice->invoice_date); ?></td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#edit<?php echo e($fee_invoice->id); ?>">
                                                <?php echo e(trans('site.edit')); ?>

                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleted<?php echo e($fee_invoice->id); ?>">
                                                <?php echo e(trans('site.delete')); ?>

                                            </button>
                                        </td>

                                        <!-- update fees model -->
                                        <div class="modal fade" id="edit<?php echo e($fee_invoice->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('student.edit_invoice')); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('feesInvoices.update', $fee_invoice->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2"><?php echo e(trans('student.name')); ?>

                                                                        :</label>
                                                                    <input  type="text" name="student_id" readonly value="<?php echo e($fee_invoice->student->name); ?>" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2"><?php echo e(trans('student.amount')); ?>

                                                                        :</label>
                                                                    <input id="name" type="text" name="amount" value="<?php echo e($fee_invoice->amount); ?>" class="form-control">
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-primary"><?php echo e(trans('site.submit')); ?></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- deleted  student from DB model -->
                                        <div class="modal fade" id="deleted<?php echo e($fee_invoice->id); ?>" tabindex="-1"
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
                                                        <form action="<?php echo e(route('feesInvoices.destroy', $fee_invoice->id)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <h5><?php echo e(trans('student.confirm_delete_invoice')); ?> : <?php echo e($fee_invoice->student->name); ?> - <?php echo e($fee_invoice->fee->title); ?>

                                                            </h5>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Fees/FeesInvoice/viewFeeInvoiceTable.blade.php ENDPATH**/ ?>