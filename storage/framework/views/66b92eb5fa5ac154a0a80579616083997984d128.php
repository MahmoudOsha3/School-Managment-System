<?php if($currentStep != 2): ?>
    <div style="display: none" class="row setup-content" id="step-2">
        <?php endif; ?>
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title"><?php echo e(trans('parent.Name_Mother')); ?></label>
                        <input type="text" wire:model="Name_Mother" class="form-control">
                        <?php $__errorArgs = ['Name_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col">
                        <label for="title"><?php echo e(trans('parent.Name_Mother_en')); ?></label>
                        <input type="text" wire:model="Name_Mother_en" class="form-control">
                        <?php $__errorArgs = ['Name_Mother_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title"><?php echo e(trans('parent.Job_Mother')); ?></label>
                        <input type="text" wire:model="Job_Mother" class="form-control">
                        <?php $__errorArgs = ['Job_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3">
                        <label for="title"><?php echo e(trans('parent.Job_Mother_en')); ?></label>
                        <input type="text" wire:model="Job_Mother_en" class="form-control">
                        <?php $__errorArgs = ['Job_Mother_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col">
                        <label for="title"><?php echo e(trans('parent.National_ID_Mother')); ?></label>
                        <input type="text" wire:model="National_ID_Mother" class="form-control">
                        <?php $__errorArgs = ['National_ID_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col">
                        <label for="title"><?php echo e(trans('parent.Passport_ID_Mother')); ?></label>
                        <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                        <?php $__errorArgs = ['Passport_ID_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col">
                        <label for="title"><?php echo e(trans('parent.Phone_Mother')); ?></label>
                        <input type="text" wire:model="Phone_Mother" class="form-control">
                        <?php $__errorArgs = ['Phone_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity"><?php echo e(trans('parent.Nationality_Father_id')); ?></label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                            <option selected><?php echo e(trans('parent.Choose')); ?>...</option>
                            <?php $__currentLoopData = $Nationalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $National): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($National->id); ?>"><?php echo e($National->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['Nationality_Mother_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col">
                        <label for="inputState"><?php echo e(trans('parent.Blood_Type_Father_id')); ?></label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                            <option selected><?php echo e(trans('parent.Choose')); ?>...</option>
                            <?php $__currentLoopData = $Type_Bloods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type_Blood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Type_Blood->id); ?>"><?php echo e($Type_Blood->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['Blood_Type_Mother_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col">
                        <label for="inputZip"><?php echo e(trans('parent.Religion_Father_id')); ?></label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                            <option selected><?php echo e(trans('parent.Choose')); ?>...</option>
                            <?php $__currentLoopData = $Religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Religion->id); ?>"><?php echo e($Religion->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['Religion_Mother_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><?php echo e(trans('parent.Address_Mother')); ?></label>
                    <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    <?php $__errorArgs = ['Address_Mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    <?php echo e(trans('parent.Back')); ?>

                </button>


                <?php if(! $updatedMode): ?>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit"
                    type="button"><?php echo e(trans('parent.Next')); ?>

                    </button>
                <?php else: ?>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmitUpdated"
                    type="button"><?php echo e(trans('parent.Next')); ?>

                    </button>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/livewire/Mother_Form.blade.php ENDPATH**/ ?>