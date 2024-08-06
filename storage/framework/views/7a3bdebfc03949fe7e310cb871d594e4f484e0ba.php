        <!-- add_modal_classroom -->
        <div class="modal fade" id="edit<?php echo e($subject->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            <?php echo e(trans('site.add_subject')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="<?php echo e(route('subjects.update' , $subject->id )); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="name"
                                        class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                        :</label>
                                    <input id="name" type="text" name="name_ar" value="<?php echo e($subject->getTranslation('name','ar')); ?>" class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                        class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                        :</label>
                                    <input type="text" class="form-control" name="name_en" value="<?php echo e($subject->getTranslation('name','en')); ?>">
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
                                                <option value="<?php echo e($grade->id); ?>" <?php if($grade->id === $subject->grade->id): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2"><?php echo e(trans('site.classroom_id')); ?> :</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="<?php echo e($subject->classroom->id); ?>" selected> <?php echo e($subject->classroom->name); ?></option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="section_id"
                                            class="mr-sm-2"><?php echo e(trans('site.section')); ?> :</label>
                                        <select name="section_id" id="section_id" class="form-control">
                                            <option value="<?php echo e($subject->section->id); ?>" selected> <?php echo e($subject->section->name); ?></option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2"><?php echo e(trans('site.teacher')); ?> :</label>
                                        <select name="teacher_id" id="teacher_id" class="form-control">
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>" <?php if($teacher->id == $subject->teacher->id): echo 'selected'; endif; ?>><?php echo e($teacher->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Subjects/updatedModel.blade.php ENDPATH**/ ?>