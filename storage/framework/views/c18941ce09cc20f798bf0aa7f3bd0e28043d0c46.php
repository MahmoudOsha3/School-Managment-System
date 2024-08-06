<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="name_ar"><br>
        <input type="text" wire:model="name_en"><br>
        <select wire:model="grade_id">
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <select wire:model="classroom_id">
            <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($classroom->id); ?>"><?php echo e($classroom->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="submit" value="Save">
    </form>
</div>

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

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<div>
    <input type="text"  wire:model="search">
    <br><br>
    <?php echo e($data); ?>

</div>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/livewire/goolge.blade.php ENDPATH**/ ?>