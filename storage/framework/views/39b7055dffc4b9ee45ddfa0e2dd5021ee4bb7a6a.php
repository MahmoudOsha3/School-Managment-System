<div>

    <input type="text" wire:model="search" placeholder="Search now">


    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul>
            <li>Name : <?php echo e($user->name); ?></li>
            <li>Email : <?php echo e($user->email); ?></li>
        </ul>
        <br><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\Projects Laravel\School Management System\resources\views/livewire/counter.blade.php ENDPATH**/ ?>