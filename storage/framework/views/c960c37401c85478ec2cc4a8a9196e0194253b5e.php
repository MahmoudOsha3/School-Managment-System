<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.manage_promotion')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.manage_promotion')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.manage_promotion')); ?></li>
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

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#return">
                        <?php echo e(trans('student.return_process')); ?>

                    </button>

                    

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info"><?php echo e(trans('student.student')); ?></th>
                                    <th class="alert-danger"><?php echo e(trans('student.pre_grade')); ?></th>
                                    <th class="alert-danger"><?php echo e(trans('student.pre_classroom')); ?></th>
                                    <th class="alert-danger"><?php echo e(trans('student.pre_section')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.current_grade')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.current_classroom')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.current_section')); ?></th>
                                    <th class="alert-danger"><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($promotion->student->name); ?></td>
                                        <td><?php echo e($promotion->fromGrade->name); ?></td>
                                        <td><?php echo e($promotion->fromClassroom->name); ?></td>
                                        <td><?php echo e($promotion->fromSection->name); ?></td>
                                        <td><?php echo e($promotion->toGrade->name); ?></td>
                                        <td><?php echo e($promotion->toClassroom->name); ?></td>
                                        <td><?php echo e($promotion->toSection->name); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#returnPromotion<?php echo e($promotion->id); ?>">
                                                <?php echo e(trans('student.btn-return-promotion')); ?>

                                            </button>
                                        </td>

                                        <!-- return one student promotion model -->
                                        <div class="modal fade" id="returnPromotion<?php echo e($promotion->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('student.return_promotion')); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('return.promotion' , $promotion->id )); ?>" method="get">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($promotion->id); ?>">
                                                        <p><?php echo e(trans('student.return_promotion')); ?> : <?php echo e($promotion->student->name); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                    <button type="submit" class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
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


    <!-- return all promotions model -->
    <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('promotion.delete_promotion')); ?></h4>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('promotions.destroy' , 'test')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <p><?php echo e(trans('student.confrim_return')); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                <button type="submit" class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                </form>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/promotion/managment.blade.php ENDPATH**/ ?>