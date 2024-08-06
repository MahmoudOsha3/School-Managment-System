<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.teachers')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('site.teachers')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('site.teachers')); ?></li>
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
                    <a style="font-size:18px ;font-weight:bold" href="<?php echo e(route('teachers.create')); ?>" type="button" class="button x-small">
                        <?php echo e(trans('site.add_teacher')); ?>

                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('site.name_teacher')); ?></th>
                                    <th><?php echo e(trans('site.email')); ?></th>
                                    <th><?php echo e(trans('site.address')); ?></th>
                                    <th><?php echo e(trans('site.specailization')); ?></th>
                                    <th><?php echo e(trans('site.gender')); ?></th>
                                    <th><?php echo e(trans('site.joining_date')); ?></th>
                                    <th><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($teacher->name); ?></td>
                                        <td><?php echo e($teacher->email); ?></td>
                                        <td><?php echo e($teacher->address); ?></td>
                                        <td><?php echo $teacher->specialization->name ?? 'Null' ; ?></td>
                                        <td><?php echo $teacher->gender->name  ?? 'Null' ; ?></td>
                                        <td><?php echo e($teacher->joining_date); ?></td>
                                        <td>
                                            <a style="font-size:18px ;font-weight:bold" href="<?php echo e(route('teachers.edit' , $teacher->id )); ?>" type="button" class="btn btn-primary btn-sm">
                                                <?php echo e(trans('site.edit')); ?>

                                            </a>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo e($teacher->id); ?>">
                                                <?php echo e(trans('site.delete')); ?>

                                            </button>
                                        </td>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('site.tdelete_teacher')); ?></h4>
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('teachers.destroy' , $teacher->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="text" name="name" value="<?php echo e($teacher->getTranslation('name', App::getLocale())); ?>" class="form-control" disabled>

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
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/index.blade.php ENDPATH**/ ?>