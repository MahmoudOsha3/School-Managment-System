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
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('student.quizze')); ?></th>
                                    <th><?php echo e(trans('student.subject')); ?></th>
                                    <th><?php echo e(trans('site.grade')); ?></th>
                                    <th><?php echo e(trans('site.classroom_id')); ?></th>
                                    <th><?php echo e(trans('site.section')); ?></th>
                                    <th><?php echo e(trans('site.teacher')); ?></th>
                                    <th><?php echo e(trans('site.total_score')); ?></th>
                                    <th><?php echo e(trans('site.enter_score')); ?></th>
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
                                        <td><?php echo e($quizze->question->sum('score')); ?></td>
                                        <td>
                                            <center>
                                                <?php if($quizze->report_degree_quizze->where('student_id' , auth()->user()->id )->count() == 1): ?>
                                                    <?php echo e($quizze->report_degree_quizze->where('student_id' , auth()->user()->id )->pluck('score_student')->first()); ?>

                                                <?php else: ?>
                                                    <a href="<?php echo e(route('student.quizze.strat' , $quizze->id )); ?>" class="btn btn-success btn-sm" >
                                                        <?php echo e(trans('student.join_now')); ?> <i class="bi bi-card-text"></i>
                                                    </a>
                                                <?php endif; ?>

                                            </center>
                                        </td>


                                        
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
                                                        <form action="<?php echo e(route('quizzes.destroy', $quizze->id)); ?>"
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
                    url: "<?php echo e(URL::to('get_sections')); ?>/" + grade_id,
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

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/dashboard/Quizze/index.blade.php ENDPATH**/ ?>