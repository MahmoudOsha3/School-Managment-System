<?php $__env->startSection('css'); ?>
<?php echo \Livewire\Livewire::styles(); ?>

    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.sections')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('site.sections')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('site.sections')); ?></li>
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
                    <button style="font-size:18px ;font-weight:bold" type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('site.add_section')); ?>

                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('site.name_sections')); ?></th>
                                    <th><?php echo e(trans('site.name_grades')); ?></th>
                                    <th><?php echo e(trans('site.name_classroom')); ?></th>
                                    <th><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($section->name); ?></td>
                                        <td><?php echo e($section->grade->name); ?></td>
                                        <td><?php echo e($section->classroom->name); ?></td>

                                        <td>
                                            <button style="font-size:18px ;font-weight:bold" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo e($section->id); ?>">
                                                <?php echo e(trans('site.edit')); ?>

                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo e($section->id); ?>">
                                                <?php echo e(trans('site.delete')); ?>

                                            </button>

                                            <?php if($section->status == true): ?>
                                                <a class="btn btn-primary" href="<?php echo e(route('section.active' , $section->id)); ?>" style="color: white"><?php echo e(__('site.active')); ?></a>
                                            <?php else: ?>
                                                <a class="btn btn-danger"  href="<?php echo e(route('section.active' , $section->id)); ?>" style="color: white" ><?php echo e(__('site.disactive')); ?></a>
                                            <?php endif; ?>
                                        </td>

                                        <!-- edit_modal_section -->
                                        <div class="modal fade" id="edit<?php echo e($section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                                                            <?php echo e(trans('site.edit_section')); ?>

                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="<?php echo e(route('sections.update' , $section->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PATCH'); ?>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="name_ar" class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                                                        :</label>
                                                                    <input id="name_ar" type="text" name="name_ar" value="<?php echo e($section->getTranslation('name', 'ar')); ?>" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                                                        :</label>
                                                                    <input type="text" class="form-control" name="name_en" value="<?php echo e($section->getTranslation('name', 'en')); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="font-size:18px ;font-weight:bold" for="exampleFormControlTextarea1"><?php echo e(trans('site.notes')); ?>

                                                                    :</label>
                                                                <textarea class="form-control" name="notes"  id="exampleFormControlTextarea1"
                                                                    rows="3"><?php echo e($section->notes); ?></textarea>
                                                            </div>
                                                            <br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                        <button type="submit" class="btn btn-success"><?php echo e(trans('site.submit')); ?></button>
                                                    </div>
                                                    </form>

                                                    </div>
                                                </div>
                                        </div>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('site.warning_delete_section')); ?></h4>
                                                
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('sections.destroy' , $section->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="text" name="name" value="<?php echo e($section->getTranslation('name' , App::getLocale() )); ?>" class="form-control" disabled>

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

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('SectionsLivewire')->html();
} elseif ($_instance->childHasBeenRendered('HxQyIYe')) {
    $componentId = $_instance->getRenderedChildComponentId('HxQyIYe');
    $componentTag = $_instance->getRenderedChildComponentTagName('HxQyIYe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HxQyIYe');
} else {
    $response = \Livewire\Livewire::mount('SectionsLivewire');
    $html = $response->html();
    $_instance->logRenderedChild('HxQyIYe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <!-- add_modal_section -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            <?php echo e(trans('site.add_section')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form wire:model="submitSection" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name" class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                        :</label>
                                    <input id="Name" type="text" wire:model="name_ar"  class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                        :</label>
                                    <input type="text" class="form-control" wire:model="name_en">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" ><?php echo e(trans('site.name_grades')); ?>:</label>
                                <select wire:model="grade_id"  class="custom-select">
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="exampleFormControlTextarea1"><?php echo e(trans('site.notes')); ?>

                                    :</label>
                                    <select wire:model="classroom_id" class="custom-select">
                                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($classroom->id); ?>"><?php echo e($classroom->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(trans('site.submit')); ?></button>
                    </div>
                    </form>

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
<?php echo \Livewire\Livewire::scripts(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\School Management System\resources\views/livewire/section.blade.php ENDPATH**/ ?>