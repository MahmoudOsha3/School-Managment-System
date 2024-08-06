
<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.create_graduate')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.create_graduate')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <?php if(Session::has('error_promotions')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo e(Session::get('error_promotions')); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                        <h6 style="color: red;font-family: Cairo"><?php echo e(trans('student.grade_acient')); ?></h6><br>

                    <form method="post" action="<?php echo e(route('promotions.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState"><?php echo e(trans('site.grade')); ?></label>
                                <select class="custom-select mr-sm-2" name="grade_id" required>
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id"><?php echo e(trans('site.classroom')); ?> : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id"><?php echo e(trans('site.section')); ?> : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year"><?php echo e(trans('student.academic_year')); ?> : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php
                                        $current_year = date("Y");
                                    ?>
                                    <?php for($year=$current_year; $year<=$current_year +1 ;$year++): ?>
                                        <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        </div>
                        <br><h6 style="color: red;font-family: Cairo"><?php echo e(trans('student.grade_new')); ?></h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState"><?php echo e(trans('site.grade')); ?></label>
                                <select class="custom-select mr-sm-2" name="grade_id_new" >
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id"><?php echo e(trans('site.classroom')); ?>: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new" >

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:<?php echo e(trans('site.section')); ?> </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"><?php echo e(trans('student.academic_year')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php
                                            $current_year = date("Y");
                                        ?>
                                        <?php for($year=$current_year; $year<=$current_year +1 ;$year++): ?>
                                            <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(trans('site.submit')); ?></button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>  
    <script>

    // ancient data
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "<?php echo e(URL::to('classes')); ?>/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "<?php echo e(URL::to('get_sections')); ?>/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });

        // new data
        $(document).ready(function () {
            $('select[name="grade_id_new"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "<?php echo e(URL::to('classes')); ?>/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id_new"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });

                $(document).ready(function () {
            $('select[name="classroom_id_new"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "<?php echo e(URL::to('get_sections')); ?>/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id_new"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
        </script>
    @toastr_js
    @toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/graduates/graduateStudents.blade.php ENDPATH**/ ?>