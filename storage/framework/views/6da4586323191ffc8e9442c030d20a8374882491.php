<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.report_attendance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.report_attendance')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.report_attendance')); ?></li>
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
                    <br>

                    <form method="post" action="<?php echo e(route('parent.select.view.report.attendanece')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <label for="inputState"><?php echo e(trans('student.students')); ?></label>
                                <select class="custom-select mr-sm-2" name="student_id" required>
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($student->id); ?>"><?php echo e($student->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="title"><?php echo e(trans('student.from_date')); ?></label>
                                    <input class="form-control" value="<?php echo e(old('from_date')); ?>" type="date"  id="datepicker-action" name="from_date" data-date-format="yyyy-mm-dd"  required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="title"><?php echo e(trans('student.from_date')); ?></label>
                                    <input class="form-control" type="date" value="<?php echo e(old('to_date')); ?>"  id="datepicker-action" name="to_date" data-date-format="yyyy-mm-dd"  required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('site.submit')); ?></button>
                            </div>
                        </div>
                    </form>

                    <?php if(isset($attendance)): ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(trans('student.name')); ?></th>
                                        <th><?php echo e(trans('site.grade')); ?></th>
                                        <th><?php echo e(trans('site.classroom_id')); ?></th>
                                        <th><?php echo e(trans('site.section')); ?></th>
                                        <th><?php echo e(trans('site.date')); ?></th>
                                        <th><?php echo e(trans('site.status')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1 ;
                                        $count_Attend = 0 ;
                                        $count_Absent = 0 ;
                                    ?>
                                    <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($attend->student->name); ?></td>
                                            <td><?php echo e($attend->grade->name); ?></td>
                                            <td><?php echo e($attend->classroom->name); ?></td>
                                            <td><?php echo e($attend->section->name); ?></td>
                                            <td><?php echo e($attend->date_attednace); ?></td>
                                            <?php $status = $attend->attednace_status == 1 ? trans('student.attend') : trans('student.absent') ; ?>
                                            <?php $colorStatus = $attend->attednace_status == 1 ? 'success' : 'danger' ; ?>
                                            <td class="text-<?php echo e($colorStatus); ?>"><?php echo e($status); ?></td>
                                            <?php
                                                if ( $attend->attednace_status == 1)
                                                {
                                                    $count_Attend += 1 ;
                                                }else
                                                {
                                                    $count_Absent += 1 ;
                                                }
                                            ?>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>

                            </table>
                                <h5 class="text-success"><?php echo e(trans('student.total_attendance')); ?> : <?php echo e($count_Attend); ?> </h5>
                                <h5 class="text-danger"><?php echo e(trans('student.total_absent')); ?>  : <?php echo e($count_Absent); ?> </h5>
                        </div>
                    <?php endif; ?>
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

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('teacher/grade/students')); ?>/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="student_id"]').empty();
                        $('select[name="student_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="student_id"]').append('<option value="' + key + '">' + value + '</option>');
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/parent/dashboard/attendance/index.blade.php ENDPATH**/ ?>