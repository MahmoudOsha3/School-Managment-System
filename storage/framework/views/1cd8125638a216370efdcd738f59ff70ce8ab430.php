<?php $__env->startSection('css'); ?>
    @toastr_css
    <?php $__env->startSection('title'); ?>
        <?php echo e(trans('site.profile')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('site.profile')); ?>

    <?php $__env->stopSection(); ?>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->


<h3>
    <?php echo e(trans('site.profile')); ?>

</h3>
    <div class="card-body">

        <section style="background-color: #eee;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php echo e(URL::asset('assets/images/student.png')); ?>"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 style="font-family: Cairo" class="my-3"><?php echo e($student->name); ?></h5>
                            <p class="text-muted mb-1"><?php echo e($student->email); ?></p>
                            <p class="text-muted mb-4"><?php echo e(trans('student.student')); ?></p>
                            <p class="text-muted mb-4"><?php echo e($student->grade->name); ?> - <?php echo e($student->classroom->name); ?> - <?php echo e($student->section->name); ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="<?php echo e(route('student.profile.update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><?php echo e(trans('site.ar.name')); ?></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_ar"
                                                   value="<?php echo e($student->getTranslation('name', 'ar')); ?>"
                                                   class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><?php echo e(trans('site.en.name')); ?></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="text" name="name_en"
                                                   value="<?php echo e($student->getTranslation('name', 'en')); ?>"
                                                   class="form-control" readonly>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><?php echo e(trans('site.password')); ?></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </p><br><br>
                                        <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                               id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"><?php echo e(trans('site.apear_password')); ?></label>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success"><?php echo e(trans('site.edit_data')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Students/dashboard/Profile/index.blade.php ENDPATH**/ ?>