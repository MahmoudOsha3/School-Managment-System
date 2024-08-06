<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.quizzes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.quizzes')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.quizzes')); ?></li>
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('student.add_quizee')); ?>

                    </button>


                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('student.name')); ?></th>
                                    <th><?php echo e(trans('student.subject')); ?></th>
                                    <th><?php echo e(trans('site.grade')); ?></th>
                                    <th><?php echo e(trans('site.classroom_id')); ?></th>
                                    <th><?php echo e(trans('site.section')); ?></th>
                                    <th><?php echo e(trans('site.teacher')); ?></th>
                                    <th><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizze): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($quizze->title); ?></td>
                                        <td><?php echo e($quizze->subject->name); ?></td>
                                        <td><?php echo e($quizze->grade->name); ?></td>
                                        <td><?php echo e($quizze->classroom->name); ?></td>
                                        <td><?php echo e($quizze->section->name); ?></td>
                                        <td><?php echo e($quizze->teacher->name); ?></td>
                                        <td>

                                            <button type="button" class="btn btn-primary btn-sm" title="<?php echo e(trans('site.edit')); ?>" data-toggle="modal" data-target="#edit<?php echo e($quizze->id); ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="<?php echo e(route('quizze.show',$quizze->id)); ?>"
                                                class="btn btn-warning btn-sm" title="<?php echo e(trans('student.question')); ?>" role="button" aria-pressed="true"><i
                                                    class="fa fa-binoculars"></i></a>

                                            <a href="<?php echo e(route('report.quizze',$quizze->id)); ?>"
                                                class="btn btn-info btn-sm" title="<?php echo e(trans('site.report_quizze')); ?>" role="button" aria-pressed="true"><i
                                                    class="fa fa-eye"></i></a>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#delete<?php echo e($quizze->id); ?>" title="<?php echo e(trans('site.delete')); ?>"><i
                                                    class="fa fa-trash"></i></button>



                                        </td>


                                        <?php echo $__env->make('pages.Teachers.dashboard.Quizze.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($quizze->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('student.delete_quizee')); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('quizze.destroy' , $quizze->id )); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input type="text" name="name"
                                                                value="<?php echo e($quizze->getTranslation('title', App::getLocale())); ?>"
                                                                class="form-control" disabled>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
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
    </div>
</div>
<!-- breadcrumb -->
<?php echo $__env->make('pages.Teachers.dashboard.Quizze.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        $('select[name="classroom_id"]').empty();
                        $('select[name="classroom_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    $(document).ready(function () {
        $('select[name="classroom_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('teacher/getSections')); ?>/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    $(document).ready(function () {
        $('select[name="section_id"]').on('change', function () {
            var section_id = $(this).val();
            if (section_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('teacher/getSubject')); ?>/" + section_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subject_id"]').empty();
                        $('select[name="subject_id"]').append('<option value="" disabled selected>' +  "<?php echo e(trans('student.Choose')); ?>" +  '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Quizze/index.blade.php ENDPATH**/ ?>