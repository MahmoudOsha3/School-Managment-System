<?php $__env->startSection('css'); ?>
<?php echo \Livewire\Livewire::styles(); ?>

<style>

    .container {
        text-align: center;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    .container h1 {
        color: #4caf50;
    }
    .container p {
        font-size: 18px;
        color: #333;
    }
    .score {
        font-size: 24px;
        color: #ff5722;
        margin-top: 10px;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #45a049;
    }
</style>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_question')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.quizze')); ?> : <?php echo e($quizze->title); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.list_question')); ?></li>
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
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show-questions', ['quizze_id' => $quizze_id ])->html();
} elseif ($_instance->childHasBeenRendered('2QhGPjN')) {
    $componentId = $_instance->getRenderedChildComponentId('2QhGPjN');
    $componentTag = $_instance->getRenderedChildComponentTagName('2QhGPjN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2QhGPjN');
} else {
    $response = \Livewire\Livewire::mount('show-questions', ['quizze_id' => $quizze_id ]);
    $html = $response->html();
    $_instance->logRenderedChild('2QhGPjN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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
<?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/dashboard/Quizze/questions.blade.php ENDPATH**/ ?>