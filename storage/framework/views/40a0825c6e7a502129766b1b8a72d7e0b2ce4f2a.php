<?php $__env->startSection('css'); ?>
@toastr_css

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.sections')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->

    <?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('site.sections')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('site.add_section')); ?></a>
                </div>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="acd-group">
                                    <a href="#" class="acd-heading"><?php echo e($grade->name); ?></a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th><?php echo e(trans('site.sections')); ?>

                                                                    </th>
                                                                    <th><?php echo e(trans('site.classroom')); ?></th>
                                                                    <th><?php echo e(trans('site.status')); ?></th>
                                                                    <th><?php echo e(trans('site.action')); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php  $i = 0; ?>
                                                                    <?php $__currentLoopData = $grade->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <?php   $i++; ?>
                                                                            <td><?php echo e($i); ?></td>
                                                                            
                                                                            <td><?php echo e($section->name); ?></td>
                                                                            
                                                                            <td><?php echo e($section->classroom->name); ?>

                                                                            <td>
                                                                                <?php if($section->status == true): ?>
                                                                                    <label class="badge badge-success"><?php echo e(trans('site.active')); ?></label>
                                                                                <?php else: ?>
                                                                                    <label class="badge badge-danger"><?php echo e(trans('site.not_active')); ?></label>
                                                                                <?php endif; ?>
                                                                            </td>

                                                                            <td>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-info btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#edit<?php echo e($section->id); ?>"><?php echo e(trans('site.edit')); ?></a>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete<?php echo e($section->id); ?>"><?php echo e(trans('site.delete')); ?></a>
                                                                            </td>




                                                                            <!--تعديل قسم  -->
                                                                            <div class="modal fade" id="edit<?php echo e($section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                style="font-family: 'Cairo', sans-serif;"
                                                                                                id="exampleModalLabel">
                                                                                                <?php echo e(trans('Sections_trans.edit_Section')); ?>

                                                                                            </h5>
                                                                                            <button type="button" class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="<?php echo e(route('sections.update', 'test')); ?>" method="POST">
                                                                                                <?php echo e(method_field('patch')); ?>

                                                                                                <?php echo e(csrf_field()); ?>

                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <input type="text" name="section_ar" class="form-control"
                                                                                                            value="<?php echo e($section->getTranslation('name', 'ar')); ?>">
                                                                                                </div>

                                                                                                <div class="col">
                                                                                                    <input type="text" name="section_en" class="form-control"
                                                                                                        value="<?php echo e($section->getTranslation('name', 'en')); ?>">
                                                                                                    <input id="id" type="hidden" name="id" class="form-control"value="<?php echo e($section->id); ?>">
                                                                                                </div>

                                                                                                </div>
                                                                                                <br>


                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label"><?php echo e(trans('site.grades')); ?></label>
                                                                                                <select name="grade_id"
                                                                                                        class="custom-select"
                                                                                                        onclick="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    
                                                                                                    <?php $__currentLoopData = $list_grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <option value="<?php echo e($grades->id); ?>" <?php if($grades->id == $section->grade->id): echo 'selected'; endif; ?> ><?php echo e($grades->name); ?></option>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label"><?php echo e(trans('site.classroom')); ?></label>
                                                                                                <select name="class_id" class="custom-select">
                                                                                                    <option value="<?php echo e($section->classroom->id); ?>">
                                                                                                        <?php echo e($section->classroom->name); ?>

                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>

                                                                                            <label for=""><?php echo e(trans('site.edit_teacher')); ?></label>
                                                                                            <select name="teacher_id[]" class="form-select form-control" multiple aria-label="Multiple select example">

                                                                                                <?php $__currentLoopData = $section->teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher_selected): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option value="<?php echo e($teacher_selected['id']); ?>" selected><?php echo e($teacher_selected->name); ?>  ::  <?php echo e($teacher_selected->specialization->name); ?></option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="" disabled>-------------------------------------</option>
                                                                                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?>  ::  <?php echo e($teacher->specialization->name); ?></option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>

                                                                                            <br>
                                                                                            <div class="col">
                                                                                                <input type="radio" name="status"  value="<?php echo e(true); ?>" id="active">
                                                                                                <label for="active"><?php echo e(trans('site.active')); ?></label>
                                                                                                <br>
                                                                                                <input type="radio" name="status" value="<?php echo e(0); ?>" id="disactive">
                                                                                                <label for="disactive"><?php echo e(trans('site.disactive')); ?></label>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                                                                                        </div>
                                                                                </form>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <!-- delete_modal_Grade -->
                                                                            <div class="modal fade" id="delete<?php echo e($section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('site.delete_section')); ?></h4>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="<?php echo e(route('sections.destroy' , $section->id)); ?>" method="post">
                                                                                                <?php echo csrf_field(); ?>
                                                                                                <?php echo method_field('delete'); ?>
                                                                                                <input type="text" name="name" value="<?php echo e($section->getTranslation('name' , App::getLocale() )); ?> - <?php echo e($section->classroom->getTranslation('name' , App::getLocale())); ?> -<?php echo e($section->grade->getTranslation('name' , App::getLocale() )); ?>" class="form-control" disabled>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                                                            <button type="submit" class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                        </div>
                    </div>

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        <?php echo e(trans('site.add_section')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="<?php echo e(route('sections.store')); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="section_ar" class="form-control"
                                                       placeholder="<?php echo e(trans('site.ar.name')); ?>">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="section_en" class="form-control"
                                                       placeholder="<?php echo e(trans('site.en.name')); ?>">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label"><?php echo e(trans('site.grades')); ?></label>
                                            <select name="grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected disabled><?php echo e(trans('site.grades')); ?></option>
                                                <?php $__currentLoopData = $list_grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($list_grade->id); ?>"> <?php echo e($list_grade->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                    class="control-label"><?php echo e(trans('site.classroom')); ?></label>
                                            <select name="class_id" class="custom-select">
                                                
                                            </select>
                                        </div>

                                        <br>
                                        <br>

                                        <select name="teacher_id[]" class="form-select form-control" multiple aria-label="Multiple select example">
                                            <option selected disabled value="<?php echo e(null); ?>">Choose teacher of section</option>
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?>  ::  <?php echo e($teacher->specialization->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                    <button type="submit"
                                            class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                                </div>
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
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/sections/index.blade.php ENDPATH**/ ?>