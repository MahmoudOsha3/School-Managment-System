<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.student_details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('student.student_details')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true"><?php echo e(trans('student.student_details')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false"><?php echo e(trans('student.stu_attachments')); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><?php echo e(trans('student.name')); ?></th>
                                            <td><?php echo e($student->name); ?></td>
                                            <th scope="row"><?php echo e(trans('site.email')); ?></th>
                                            <td><?php echo e($student->email); ?></td>
                                            <th scope="row"><?php echo e(trans('site.gender')); ?></th>
                                            <td><?php echo e($student->gender->name); ?></td>
                                            <th scope="row"><?php echo e(trans('student.nationality')); ?></th>
                                            <td><?php echo e($student->nationaity->name); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?php echo e(trans('site.grade')); ?></th>
                                            <td><?php echo e($student->grade->name); ?></td>
                                            <th scope="row"><?php echo e(trans('site.classroom')); ?></th>
                                            <td><?php echo e($student->classroom->name); ?></td>
                                            <th scope="row"><?php echo e(trans('site.section')); ?></th>
                                            <td><?php echo e($student->section->name); ?></td>
                                            <th scope="row"><?php echo e(trans('student.Date_of_Birth')); ?></th>
                                            <td><?php echo e($student->date_birth); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?php echo e(trans('site.parent')); ?></th>
                                            <td><?php echo e($student->Myparent->Name_Father); ?></td>
                                            <th scope="row"><?php echo e(trans('student.academic_year')); ?></th>
                                            <td><?php echo e($student->academic_year); ?></td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="<?php echo e(route('upload_attachments')); ?>" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year"><?php echo e(trans('student.stu_attachments')); ?>

                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="images[]" multiple required>
                                                        <input type="hidden" name="student_name" value="<?php echo e($student->name); ?>">
                                                        <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                        <?php echo e(trans('site.submit')); ?>

                                                </button>
                                            </form>
                                        </div>
                                        <br>

                                        <table class="table center-aligned-table mb-0 table table-hover"
                                                style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col"><?php echo e(trans('student.filename')); ?></th>
                                                <th scope="col"><?php echo e(trans('student.created_at')); ?></th>
                                                <th scope="col"><?php echo e(trans('student.actions')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $student->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($attachment->filename); ?></td>
                                                    <td><?php echo e($attachment->created_at->diffForHumans()); ?></td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="<?php echo e(url('download_attachments')); ?>/<?php echo e($attachment->imageable->name); ?>/<?php echo e($attachment->filename); ?>"
                                                            role="button"><i class="fa fa-download"></i>&nbsp; <?php echo e(trans('student.download')); ?></a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete<?php echo e($attachment->id); ?>"
                                                                title="<?php echo e(trans('Grades_trans.Delete')); ?>"><?php echo e(trans('site.delete')); ?>

                                                        </button>

                                                    </td>
                                                    <!-- delete_model -->
                                                    <div class="modal fade" id="delete<?php echo e($attachment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('student.delete_student')); ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(route('delete_attachments')); ?>" method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="text" readonly name="filename" value="<?php echo e($attachment->filename); ?>" class="form-control">
                                                                    <input type="hidden" name="student_name" value="<?php echo e($attachment->imageable->name); ?>">
                                                                    <input type="hidden" name="student_id" value="<?php echo e($attachment->imageable->id); ?>">
                                                                    <input type="hidden" name="id" value="<?php echo e($attachment->id); ?>">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                                <button type="submit" class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/show.blade.php ENDPATH**/ ?>