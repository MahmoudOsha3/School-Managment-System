<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.edit_student')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <h3><?php echo e(trans('student.edit_student')); ?></h3>
    <br>

<!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.edit_student')); ?>

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

                <form method="post"  action="<?php echo e(route('students.update' , $student->id )); ?>" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"><?php echo e(trans('student.personal_information')); ?></h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.ar.name')); ?> : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar" value="<?php echo e($student->getTranslation('name' , 'ar')); ?>"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.en.name')); ?> : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" value="<?php echo e($student->getTranslation('name' , 'en')); ?>"  type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.email')); ?> : </label>
                                    <input type="email"  name="email" value="<?php echo e($student->email); ?>" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.password')); ?> :</label>
                                    <input  type="password" name="password" value="<?php echo e($student->password); ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender"><?php echo e(trans('site.gender')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php $__currentLoopData = $data['genders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($gender->id); ?>" <?php if($gender->id == $student->gender->id): echo 'selected'; endif; ?>><?php echo e($gender->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id"><?php echo e(trans('student.nationality')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php $__currentLoopData = $data['nationalities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nationaity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($nationaity->id); ?>" <?php if($nationaity->id == $student->nationaity->id): echo 'selected'; endif; ?>><?php echo e($nationaity->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id"><?php echo e(trans('student.blood_type')); ?> : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php $__currentLoopData = $data['blood']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($blood_type->id); ?>" <?php if($blood_type->id == $student->blood->id): echo 'selected'; endif; ?>><?php echo e($blood_type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo e(trans('student.Date_of_Birth')); ?>  :</label>
                                    <input class="form-control" type="text" value="<?php echo e($student->date_birth); ?>"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"><?php echo e(trans('student.Student_information')); ?></h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="grade_id"><?php echo e(trans('site.grade')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php $__currentLoopData = $data['grades']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($grade->id); ?>" <?php if($grade->id == $student->grade->id): echo 'selected'; endif; ?> ><?php echo e($grade->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="classroom_id"><?php echo e(trans('site.classroom')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option value="<?php echo e($student->classroom->id); ?>"><?php echo e($student->classroom->name); ?></option>

                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id"><?php echo e(trans('site.section')); ?> : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option value="<?php echo e($student->section->id); ?>"><?php echo e($student->section->name); ?></option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id"><?php echo e(trans('site.parent')); ?> : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                        <?php $__currentLoopData = $data['parent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($parent->id); ?>" <?php if($parent->id == $student->Myparent->id): echo 'selected'; endif; ?> ><?php echo e($parent->Name_Father); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
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
                                        <option value="<?php echo e($year); ?>" <?php if($year == $student->academic_year ): echo 'selected'; endif; ?> ><?php echo e($year); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        </div><br>
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
    </script>


    <script>
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/edit.blade.php ENDPATH**/ ?>