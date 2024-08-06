<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.edit_question')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<h3><?php echo e(trans('student.edit_question')); ?> : <span class="text-danger"><?php echo e($question->title); ?></span></h3>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo e(session()->get('error')); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="<?php echo e(route('question.update',$question->id)); ?>" method="post" autocomplete="off">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"><?php echo e(trans('student.title_ques')); ?></label>
                                        <input type="text" name="title" id="input-name"
                                               class="form-control form-control-alternative" value="<?php echo e($question->title); ?>">

                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title"><?php echo e(trans('student.answers')); ?></label>
                                        <textarea name="answer" class="form-control" id="exampleFormControlTextarea1" rows="4"><?php echo e($question->answer); ?></textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title"><?php echo e(trans('student.right_answer')); ?></label>
                                        <input type="text" name="right_answer" id="input-name" class="form-control form-control-alternative" value="<?php echo e($question->right_answer); ?>">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id"><?php echo e(trans('student.score')); ?> : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled><?php echo e(trans('student.determine_score')); ?></option>
                                                <?php for($i = 1 ; $i <= 10 ; $i++ ): ?>
                                                    <option value="<?php echo e($i); ?>" <?php if($i == $question->score ): echo 'selected'; endif; ?>><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"><?php echo e(trans('site.submit')); ?></button>
                            </form>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Questions/edit.blade.php ENDPATH**/ ?>