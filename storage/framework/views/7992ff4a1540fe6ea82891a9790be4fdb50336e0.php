<!-- edit_modal_classroom -->
<div class="modal fade" id="edit<?php echo e($quizze->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('student.edit_quizze')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="<?php echo e(route('quizze.update' , $quizze->id )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="name"
                                class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                :</label>
                            <input id="name" type="text" name="title_ar" value="<?php echo e($quizze->getTranslation('title','ar')); ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                :</label>
                            <input type="text" class="form-control" name="title_en"  value="<?php echo e($quizze->getTranslation('title','en')); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="grade"
                                    class="mr-sm-2"><?php echo e(trans('site.name_grades')); ?> :</label>
                                <select name="grade_id" id="grade" class="form-control">
                                    <option value="<?php echo e(null); ?>" disabled selected>...</option>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>" <?php if($grade->id == $quizze->grade->id ): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                    class="mr-sm-2"><?php echo e(trans('site.classroom_id')); ?> :</label>
                                <select name="classroom_id" id="classroom_id" class="form-control">
                                    <option value="<?php echo e($quizze->classroom->id); ?>"><?php echo e($quizze->classroom->name); ?></option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                    class="mr-sm-2"><?php echo e(trans('site.section')); ?> :</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="<?php echo e($quizze->section->id); ?>"><?php echo e($quizze->section->name); ?></option>

                                    
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                    class="mr-sm-2"><?php echo e(trans('site.subject')); ?> :</label>
                                <select name="subjects_id" id="subject_id" class="form-control">
                                        <option value="<?php echo e($quizze->subject->id); ?>" ><?php echo e($quizze->subject->name); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                <button type="submit" class="btn btn-success"><?php echo e(trans('site.submit')); ?></button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Quizze/edit.blade.php ENDPATH**/ ?>