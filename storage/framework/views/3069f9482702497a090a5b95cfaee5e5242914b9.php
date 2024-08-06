<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
<?php echo e(trans('site.settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('site.settings')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('error')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="<?php echo e(route('settings.update','test')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.name_school')); ?> <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_name" value="<?php echo e($settings['school_name']); ?>" required type="text" class="form-control" placeholder="Name of School">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_session" class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.year_current')); ?><span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                        <option value=""></option>
                                        <?php for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++): ?>
                                            <option <?php echo e(($settings['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : ''); ?>><?php echo e(($y-=1).'-'.($y+=1)); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.title_school')); ?></label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="<?php echo e($settings['school_title']); ?>" type="text" class="form-control" placeholder="School Acronym">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.phone_school')); ?></label>
                                <div class="col-lg-9">
                                    <input name="phone" value="<?php echo e($settings['phone']); ?>" type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.email_school')); ?></label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="<?php echo e($settings['school_email']); ?>" type="email" class="form-control" placeholder="School Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.address_school')); ?><span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="<?php echo e($settings['address']); ?>" type="text" class="form-control" placeholder="School Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.end_first_term')); ?></label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="<?php echo e($settings['end_first_term']); ?>" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.end_secound_term')); ?></label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="<?php echo e($settings['end_second_term']); ?>" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e(trans('site.logo_school')); ?></label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <img style="width: 100px" height="100px" src="<?php echo e(URL::asset('attachemnts/logo/'.$settings['logo'])); ?>" alt="">
                                    </div>
                                    <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"><?php echo e(trans('site.submit')); ?></button>
                </form>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Settings/index.blade.php ENDPATH**/ ?>