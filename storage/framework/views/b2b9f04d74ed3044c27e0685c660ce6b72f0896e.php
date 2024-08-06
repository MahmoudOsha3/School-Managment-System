        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            <?php echo e(trans('student.add_quizze')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="<?php echo e(route('quizzes.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="name"
                                        class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                        :</label>
                                    <input id="name" type="text" name="title_ar" class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                        class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                        :</label>
                                    <input type="text" class="form-control" name="title_en">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="grade"
                                            class="mr-sm-2"><?php echo e(trans('site.name_grades')); ?> :</label>
                                        <select name="grade_id" id="grade" class="form-control">
                                            <option value="<?php echo e(null); ?>" disabled selected>...</option>
                                            <?php $__currentLoopData = $data['grades']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2"><?php echo e(trans('site.classroom_id')); ?> :</label>
                                        <select name="classroom_id" id="classroom_id" class="form-control">
                                            
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
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="grade"
                                            class="mr-sm-2"><?php echo e(trans('site.teacher')); ?> :</label>
                                        <select name="teachers_id" id="grade" class="form-control">
                                            <option value="<?php echo e(null); ?>" disabled selected>...</option>
                                            <?php $__currentLoopData = $data['teachers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                        class="mr-sm-2"><?php echo e(trans('site.subject')); ?> :</label>
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        <?php $__currentLoopData = $data['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Quizzes/addedModel.blade.php ENDPATH**/ ?>