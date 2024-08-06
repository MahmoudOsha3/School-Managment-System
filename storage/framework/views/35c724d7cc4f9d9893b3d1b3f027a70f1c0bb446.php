<?php $__env->startSection('css'); ?>
@toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.sections')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->

    <?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('site.sections')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="acd-group">
                                    <a href="#" class="acd-heading"><?php echo e($grade->name); ?></a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th><?php echo e(trans('site.sections')); ?>

                                                                    </th>
                                                                    <th><?php echo e(trans('site.classroom')); ?></th>
                                                                    <th><?php echo e(trans('site.action')); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php  $i = 0; ?>
                                                                    <?php $__currentLoopData = $grade->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <?php   $i++; ?>
                                                                            <td><?php echo e($i); ?></td>
                                                                            
                                                                            <td><?php echo e($section->name); ?></td>
                                                                            
                                                                            <td><?php echo e($section->classroom->name); ?>

                                                                            <td>
                                                                                
                                                                                <a href="<?php echo e(route('attendance.show' , $section->id )); ?>"
                                                                                    class="btn btn-outline-info btn-sm"><?php echo e(trans('student.list_students')); ?></a>
                                                                            </td>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <script>
                $(document).ready(function () {
                    $('select[name="grade_id"]').on('change', function () {
                        var grade_id = $(this).val();
                        if (grade_id) {
                            $.ajax({
                                url: "<?php echo e(URL::to('classes')); ?>/" + grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/attendance/index.blade.php ENDPATH**/ ?>