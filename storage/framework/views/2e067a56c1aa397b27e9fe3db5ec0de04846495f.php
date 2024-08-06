<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.edit_book')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <h3><?php echo e(trans('student.edit_book')); ?></h3>
    <br>

<!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.edit_book')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post"  action="<?php echo e(route('libraries.update' , $book->id )); ?>" autocomplete="off" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><?php echo e(trans('student.name_book')); ?> : <span class="text-danger">*</span></label>
                                <input  type="text" name="title" value="<?php echo e($book->title); ?>"  class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id"><?php echo e(trans('site.grade')); ?> : </label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>" <?php if($grade->id == $book->grade->id): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id"><?php echo e(trans('site.classroom_id')); ?> : </label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    <option value="<?php echo e($book->classroom->id); ?>"><?php echo e($book->classroom->name); ?></option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id"><?php echo e(trans('site.section')); ?> : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="<?php echo e($book->section->id); ?>"><?php echo e($book->section->name); ?></option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            
                            <div class="form-group">
                                <label for="academic_year"><?php echo e(trans('student.upload_book')); ?> : <span class="text-danger">*</span></label><br>
                                <input type="file" accept="application/pdf" name="file_name">
                            </div>
                        </div>
                    </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"><?php echo e(trans('site.submit')); ?></button>
                </form>

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
                        url: "<?php echo e(URL::to('teacher/getClasses')); ?>/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="class_id"]').empty();
                            $('select[name="classroom_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
                            $.each(data, function (key, value) {
                                $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
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


    <script>
        $(document).ready(function () {
            $('select[name="class_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "<?php echo e(URL::to('teacher/getSections')); ?>/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="classroom_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Library/edit.blade.php ENDPATH**/ ?>