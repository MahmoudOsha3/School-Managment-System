<?php $__env->startSection('css'); ?>
    

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('site.classroom')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> <?php echo e(trans('site.classroom')); ?></h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('site.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('site.classroom')); ?></li>
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
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('site.add_classroom')); ?>

                    </button>
                    <button type="button" class="button x-small" id="btn_delete_all">
                        <?php echo e(trans('site.delete_checkbox')); ?>

                    </button>
                    <br><br>

                    <form action="<?php echo e(route('classroom.index')); ?>" method="get">
                        <?php echo csrf_field(); ?>
                        <select name="grade_id"  style="width: 200px ; height:20px" onchange="this.form.submit()">
                            <option value="<?php echo e(null); ?>" selected disabled><?php echo e(__('site.search_using_grade')); ?></option>
                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($grade->id); ?>" <?php if($grade->id == @$_GET['grade_id']): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </form>

                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th><input name="select_all" id="example-select-all" type="checkbox"  onclick="CheckAll('box1', this)" /></th>
                                    <th>#</th>
                                    <th><?php echo e(trans('site.name_classroom')); ?></th>
                                    <th><?php echo e(trans('site.name_grades')); ?></th>
                                    <th><?php echo e(trans('site.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input type="checkbox"  value="<?php echo e($classroom->id); ?>" class="box1" ></td>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($classroom->name); ?></td>
                                        <td><?php echo e($classroom->grade->name); ?></td>
                                        <td>
                                            <button  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo e($classroom->id); ?>">
                                                <?php echo e(trans('site.edit')); ?>

                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete<?php echo e($classroom->id); ?>">
                                                <?php echo e(trans('site.delete')); ?>

                                            </button>
                                        </td>

                                        <!-- edit_modal_classroom -->
                                        <div class="modal fade" id="edit<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                                                            <?php echo e(trans('site.edit_classroom')); ?>

                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="<?php echo e(route('classroom.update' , $classroom->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PATCH'); ?>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="name_ar" class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                                                        :</label>
                                                                    <input id="name_ar" type="text" name="name_ar" value="<?php echo e($classroom->getTranslation('name', 'ar')); ?>" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                                                        :</label>
                                                                    <input type="text" class="form-control" name="name_en" value="<?php echo e($classroom->getTranslation('name', 'en')); ?>">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                                <div class="form-group">
                                                                    <label style="font-size:18px ;font-weight:bold" for="grade" class="mr-sm-2"><?php echo e(trans('site.name_grades')); ?> :</label>
                                                                    <select name="grade_id" id="grade" class="form-control">
                                                                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($grade->id); ?>" <?php if($grade->id == $classroom->grade_id): echo 'selected'; endif; ?>><?php echo e($grade->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
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

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(trans('site.confirm_delete')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('classroom.destroy' , $classroom->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <input type="text" name="name" value="<?php echo e($classroom->getTranslation('name' , App::getLocale() )); ?>" class="form-control" disabled>
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

        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            <?php echo e(trans('site.add_classroom')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="<?php echo e(route('classroom.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name" class="mr-sm-2"><?php echo e(trans('site.ar.name')); ?>

                                        :</label>
                                    <input id="Name" type="text" name="name_ar"  class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2"><?php echo e(trans('site.en.name')); ?>

                                        :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="grade" class="mr-sm-2"><?php echo e(trans('site.name_grades')); ?> :</label>
                                <select name="grade_id" id="grade" class="form-control">
                                    <option value="<?php echo e(null); ?>" disabled selected>...</option>
                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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


        <!-- حذف مجموعة صفوف -->
        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('site.delete_checkbox')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo e(route('delete_all')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <?php echo e(trans('site.confirm_delete')); ?>

                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(trans('site.close')); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo e(trans('site.submit')); ?></button>
                </div>
            </form>
        </div>
        </div>
        </div>

    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @toastr_js
    @toastr_render

    <script>
        // check all className == class == box1 , element is (this) => dirction to check box one to one
        function CheckAll(className , element){
            var elements = document.getElementsByClassName(className);
            var l = elements.length ;

            if(element.checked){
                for (var i = 0; i < l ; i++) {
                    elements[i].checked = true;
                }
            }else{
                for (var i = 0; i < l ; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                // خش علي جدول بحيث ايدي بتاع جدول مكتوب اهة في جو بقي شيك بوكس لو اتشيكت اعملي ايتش لكل واحدة واعملها بوش
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_all').modal('show') // خلي ميدوله تظهر ده ايدي بتاع ميدوله
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects Laravel\School Management System\resources\views/pages/Classroom/index.blade.php ENDPATH**/ ?>