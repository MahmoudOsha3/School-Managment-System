        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            <?php echo e(trans('student.add_exam')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="<?php echo e(route('exams.store')); ?>" method="POST">
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
                                    <label style="font-size:18px ;font-weight:bold" for="name"
                                        class="mr-sm-2"><?php echo e(trans('student.term')); ?>

                                        :</label>
                                    <input id="name" type="text" name="term" class="form-control">
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="academic_year"><?php echo e(trans('student.academic_year')); ?> : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="acdemic_year">
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Exams/addedModel.blade.php ENDPATH**/ ?>