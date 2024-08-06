<!-- delete_model -->
<div class="modal fade" id="delete<?php echo e($question->id); ?>" tabindex="-1"
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
                <form action="<?php echo e(route('question.destroy' , $question->id )); ?>"
                    method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <input type="text" name="name"
                        value="<?php echo e($question->title); ?>"
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
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Teachers/dashboard/Questions/delete.blade.php ENDPATH**/ ?>