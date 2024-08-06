<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_attendance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.list_attendance')); ?> - <?php echo e($section->grade->name); ?> - <?php echo e($section->classroom->name); ?> - <?php echo e($section->name); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.list_attendance')); ?></li>
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

                    <h5 style="font-family: 'Cairo', sans-serif;color: red"> <?php echo e(trans('student.date_day')); ?> : <?php echo e(date('Y-m-d')); ?></h5>

                    <br><br>
                    <form action="<?php echo e(route('attendance.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
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
                                                
                                                <?php if(isset($student->attendance()->where('date_attednace', date('Y-m-d'))->first()->student_id)): ?>
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendences[<?php echo e($student->id); ?>]" disabled
                                                            <?php echo e($student->attendance()->where('date_attednace', date('Y-m-d'))->first()->attednace_status == 1 ? 'checked' : ''); ?>

                                                            class="leading-tight" type="radio" value="presence">
                                                        <span class="text-success"><?php echo e(trans('student.attend')); ?></span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendences[<?php echo e($student->id); ?>]" disabled
                                                            <?php echo e($student->attendance()->where('date_attednace', date('Y-m-d'))->first()->attednace_status == 0 ? 'checked' : ''); ?>

                                                            class="leading-tight" type="radio" value="absent">
                                                        <span class="text-danger"><?php echo e(trans('student.absent')); ?></span>
                                                    </label>
                                                <?php else: ?>
                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                        <input name="attendences[<?php echo e($student->id); ?>]" class="leading-tight" type="radio"
                                                            value="<?php echo e(true); ?>">
                                                        <span class="text-success"><?php echo e(trans('student.attend')); ?></span>
                                                    </label>

                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                        <input name="attendences[<?php echo e($student->id); ?>]" class="leading-tight" type="radio"
                                                            value="<?php echo e(false); ?>">
                                                        <span class="text-danger"><?php echo e(trans('student.absent')); ?></span>
                                                    </label>
                                                <?php endif; ?>
                                            </td>

                                            <input type="hidden" value="<?php echo e($student->grade->id); ?>" name="grade_id">
                                            <input type="hidden" value="<?php echo e($student->classroom->id); ?>" name="classroom_id">
                                            <input type="hidden" value="<?php echo e($student->section->id); ?>" name="section_id">
                                            <input type="hidden" value="<?php echo e(1); ?>" name="teacher_id">
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <p>
                                <button class="btn btn-success" type="submit"><?php echo e(trans('site.submit')); ?></button>
                            </p>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/attendance/listStudents.blade.php ENDPATH**/ ?>