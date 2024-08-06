<?php $__env->startSection('css'); ?>
    
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('student.list_fees')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('student.list_fees')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('student.list_fees')); ?></li>
            </ol>
        </div>
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger">>
                            <?php echo e($errors); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="card-body">




                    <button style="font-size:18px ;font-weight:bold" type="button" class="button x-small"
                        data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('student.add_fees')); ?>

                    </button>

                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="alert-info"><?php echo e(trans('student.name')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.amount')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.grade')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.classroom')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('student.year')); ?></th>
                                    <th class="alert-success"><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($fee->title); ?></td>
                                        <td><?php echo e($fee->amount); ?></td>
                                        <td><?php echo e($fee->grade->name); ?></td>
                                        <td><?php echo e($fee->classroom->name); ?></td>
                                        <td><?php echo e($fee->year); ?></td>

                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#edit<?php echo e($fee->id); ?>">
                                                <?php echo e(trans('site.edit')); ?>

                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleted<?php echo e($fee->id); ?>">
                                                <?php echo e(trans('site.delete')); ?>

                                            </button>
                                        </td>

                                        <!-- update fees model -->
                                        <div class="modal fade" id="edit<?php echo e($fee->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('site.edit')); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('fees.update', $fee->id)); ?>"
                                                            method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                                                        :</label>
                                                                    <input  type="text" value="<?php echo e($fee->getTranslation('title' , 'ar')); ?>" name="name_ar" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                                                        :</label>
                                                                    <input type="text" value="<?php echo e($fee->getTranslation('title' , 'en')); ?>" class="form-control" name="name_en">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2"><?php echo e(trans('site.grade')); ?>

                                                                        :</label>
                                                                    <select name="grade_id" class="form-control">
                                                                        <option value="<?php echo e(null); ?>" selected disabled><?php echo e(trans('student.Choose')); ?>

                                                                            ... </option>
                                                                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($grade->id); ?>" <?php if($grade->id === $fee->grade->id ): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2"><?php echo e(trans('site.classroom')); ?>

                                                                        :</label>
                                                                    <select name="classroom_id" class="form-control">
                                                                        <option value="<?php echo e(null); ?>" selected disabled><?php echo e(trans('student.Choose')); ?>

                                                                            ... </option>
                                                                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($classroom->id); ?>" <?php if($classroom->id === $fee->classroom->id ): echo 'selected'; endif; ?>><?php echo e($classroom->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name"
                                                                        class="mr-sm-2"><?php echo e(trans('student.amount')); ?>

                                                                        :</label>
                                                                    <input id="Name" type="text" name="amount" value="<?php echo e($fee->amount); ?>" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                                                        class="mr-sm-2"><?php echo e(trans('student.year')); ?>

                                                                        :</label>
                                                                        <select name="year" class="form-control">
                                                                            <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                                                            <?php
                                                                                $current_year = date('Y');
                                                                            ?>
                                                                            <?php for($year = $current_year; $year <= $current_year + 1; $year++): ?>
                                                                                <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                                                            <?php endfor; ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-primary"><?php echo e(trans('site.submit')); ?></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- deleted  student from DB model -->
                                        <div class="modal fade" id="deleted<?php echo e($fee->id); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                                            <?php echo e(trans('site.delete')); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('fees.destroy', $fee->id)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <h5><?php echo e(trans('site.delete')); ?> : <?php echo e($fee->title); ?> - <?php echo e($fee->grade->name); ?> - <?php echo e($fee->classroom->name); ?>

                                                            </h5>
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


<!-- add_modal_fees -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('student.add_fees')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="<?php echo e(route('fees.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                :</label>
                            <input id="Name" type="text" name="name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                :</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2"><?php echo e(trans('site.grade')); ?>

                                :</label>
                            <select name="grade_id" class="form-control">
                                <option value="<?php echo e(null); ?>" selected disabled><?php echo e(trans('student.Choose')); ?>

                                    ... </option>
                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2"><?php echo e(trans('site.classroom')); ?>

                                :</label>
                                <select name="classroom_id" class="form-control">

                                
                                    
                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name"
                                class="mr-sm-2"><?php echo e(trans('student.amount')); ?>

                                :</label>
                            <input id="Name" type="text" name="amount" class="form-control">
                        </div>
                        <div class="col">
                            <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                class="mr-sm-2"><?php echo e(trans('student.year')); ?>

                                :</label>
                                <select name="year" class="form-control">
                                    <option selected disabled><?php echo e(trans('student.Choose')); ?>...</option>
                                    <?php
                                        $current_year = date('Y');
                                    ?>
                                    <?php for($year = $current_year; $year <= $current_year + 1; $year++): ?>
                                        <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                    <?php endfor; ?>
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


<!-- breadcrumb -->
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
                        $('select[name="classroom_id"]').empty();
                        $('select[name="classroom_id"]').append('<option selected disabled >' +' <?php echo e(trans('student.Choose')); ?>' + '</option>');
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/pages/Fees/index.blade.php ENDPATH**/ ?>