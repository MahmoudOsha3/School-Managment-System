<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
     <?php echo e(trans('site.library')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <h3> <?php echo e(trans('site.library')); ?> </h3><br>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo e(trans('student.name_book')); ?></th>
                                                <th><?php echo e(trans('site.grade')); ?></th>
                                                <th><?php echo e(trans('site.classroom')); ?></th>
                                                <th><?php echo e(trans('site.section')); ?></th>
                                                <th><?php echo e(trans('site.action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td><?php echo e($book->title); ?></td>
                                                    <td><?php echo e($book->grade->name); ?></td>
                                                    <td><?php echo e($book->classroom->name); ?></td>
                                                    <td><?php echo e($book->section->name); ?></td>
                                                    <td>
                                                        <center>
                                                            <a href="<?php echo e(route('student.book.download' , $book->id )); ?>" title="<?php echo e(trans('student.download')); ?>" type="button" class="btn btn-success btn-sm">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </center>

                                                    </td>

                                                    <!-- delete_model -->
                                                    <div class="modal fade" id="delete<?php echo e($book->id); ?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLongTitle">
                                                                        <?php echo e(trans('student.delete_book')); ?></h4>
                                                                    
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('libraries.destroy', $book->id)); ?>"
                                                                        method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('delete'); ?>
                                                                        <input type="text" name="name"
                                                                            value="<?php echo e($book->title); ?>"
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
        </div>
    </div>
    <!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/students/dashboard/library/index.blade.php ENDPATH**/ ?>